<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\location;
use App\Models\category;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $book = book::orderBy('id', 'DESC')->get();
        return view('buku.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $location = location::all();
        $category = category::all();
        return view('buku.create', compact('location', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_lokasi' => ['required'],
            'id_kategori' => ['required'],
            'judul' => ['required'],
            'pengarang' => ['required'],
            'penerbit' => ['required'],
            'tahun_terbit' => ['required'],
            'keterangan' => ['nullable'],
            'stock' => ['required']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        book::create([
            'id_lokasi' => $request->id_lokasi,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'keterangan' => $request->keterangan,
            'stock' => $request->stock
        ]);
        return redirect()->to('buku/index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = book::find($id);
        $location = location::all();
        $category = category::all();
        return view('buku.edit', compact('book', 'location', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        $rules = [
            'id_lokasi' => ['required'],
            'id_kategori' => ['required'],
            'judul' => ['required'],
            'pengarang' => ['required'],
            'penerbit' => ['required'],
            'tahun_terbit' => ['required'],
            'keterangan' => ['nullable'],
            'stock' => ['required']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $book->id_lokasi = $request->id_lokasi;
        $book->id_kategori = $request->id_kategori;
        $book->judul = $request->judul;
        $book->pengarang = $request->pengarang;
        $book->penerbit = $request->penerbit;
        $book->tahun_terbit = $request->tahun_terbit;
        $book->keterangan = $request->keterangan;
        $book->stock = $request->stock;
        $book->save();
        return redirect()->to('buku/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = book::find($id);
        $book->delete();
        return redirect()->to('buku/index');
    }
}
