<?php

namespace App\Http\Controllers;

use App\Models\DetailBorrows;
use Illuminate\Http\Request;
use App\Models\Members;
use App\Models\Category;
use App\Models\Borrows;
use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrows::with('member', 'detailBorrows')->orderBy('id', 'desc')->get();
        return view('pinjam.index', compact('borrows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //trans PJM-today-001
        $kode = 'PJM';
        $today = Carbon::now()->format('Ymd');
        $prefix = $kode . '-' . $today;
        $lastTransaction = Borrows::whereDate('created_at', Carbon::today())->orderBy('id', 'desc')->first();

        if ($lastTransaction) {
            $lastNumber = (int) substr($lastTransaction->trans_number, -3);
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '001';
        }
        $trans_number = $prefix . $newNumber;

        $members = Members::get();
        $categories = Category::get();
        return view('pinjam.create', compact('members', 'categories', 'trans_number'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $insertBorrow = Borrows::create([
                'id_anggota' => $request->id_anggota,
                'trans_number' => $request->trans_number,
                'return_date' => $request->return_date,
                'note' => $request->note,
            ]);

            foreach ($request->id_buku as $key => $value) {
                DetailBorrows::create([
                    'id_borrow' => $insertBorrow->id,
                    'id_book' => $request->id_buku[$key],
                ]);
            }
            DB::commit();
            Alert::success('Success Title', 'Transaksi berhasil dibuat');

            return redirect()->route('print-peminjam', ['id' => $insertBorrow->id]);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            // Alert::success('Upsss!!!', $th->getMessage());

            return redirect()->to('transaction');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $borrow = Borrows::with('detailBorrows.book', 'member')->find($id);
        return view('pinjam.show', compact('borrow'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = Borrows::find( $id);
        $borrow->detailBorrows()->delete();
        $borrow->delete();
        return redirect()->to('transaction');
    }

    public function getBukuByIdCategory($id_category)
    {
        try {
            $book = Book::where('id_kategori', $id_category)->get();
            return response()->json(['status' => 'success', 'message' => 'fetch book success', 'data' => $book]);
        } catch (\Throwable $th) {
            return response()->json(['status' => 'error', 'message' => $th->getMessage()], 500);
        }
    }
    public function print($id_borrow)
    {
        $borrow = Borrows::with('member','detailBorrows.book')->find($id_borrow);
        return view('pinjam.print', compact('borrow'));
    }
    public function returnBook(Request $request, $id)
    {
        $borrow = Borrows::findOrFail($id);//404
        // $borrow = Borrows::find($id); //blank

        if (!$borrow->actual_return_date) {
           $fine= 0;
        }
        $returnDate = \Carbon\carbon::parse($borrow->return_date)->startOfDay();
        $actualReturnDate = \Carbon\carbon::parse($borrow->actual_return_date)->startOfDay();

        //lebih besar dari
        // greaterThan()
        // if ($actualReturnDate > $returnDate) {
        if ($actualReturnDate->greaterThan($returnDate)){
            // 2 * 200000 = actualDate * total denda
            $late = $returnDate->diffInDays($actualReturnDate);
            $fine = $late *5000;
        }

        $borrow->actual_return_date = now();
        // $borrow->actual_return_date =  Carbon::now();
        $borrow->fine = $fine;
        $borrow->status = 0;
        $borrow->save();
        Alert::success('Ciee Berhasil','Buku Berhasil Dikembalikan');
        return redirect()->to('transaction');

    }
}

