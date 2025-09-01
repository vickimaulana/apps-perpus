<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Unique;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //SELECT * FROM members;
        $members = Members::all();
        return view('anggota.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lasId = DB::table('members')->max('id') ?? 0;
        $newId = $lasId +1;
        $pref  = 'MEMBER';
        $date = now()->format('d-m-Y');
        $counter = str_pad($newId, 5, '0', STR_PAD_LEFT);
        $code = "{$pref}-{$date}-{$counter}";
        return view('anggota.create', compact('code'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rulles = [
            'nomor_anggota' => ['required'],
            'nik' => ['required', 'numeric'],
            'nama_anggota' => ['required'],
            'no_hp' => ['required', 'unique:members'],
            'email' => ['required', 'unique:members'],
        ];
        $validators = Validator::make($request->all(),$rulles);
        if ($validators->fails()){
        return back()->withErrors($validators)->withInput();
        }

        Members::create([
            'nomor_anggota' =>$request->nomor_anggota,
            'nik' =>$request->nik,
            'nama_anggota' =>$request->nama_anggota,
            'no_hp' =>$request->no_hp,
            'email' =>$request->email,
        ]);
        return redirect()->to('anggota/index');
    }

    public function softDelete(string $id)
    {
    $members = Members::find($id);
    $members->delete();
    return redirect()->to('anggota/index');
    }
    public function indexRestore()
    {
       $members_r = Members::onlyTrashed()->get();
        return view('anggota.restore.restore', compact('members_r'));
    }
    public function restore(string $id){
        $members = Members::withTrashed()->find($id);
        $members->restore();
        return redirect()->to('anggota/index');
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
        $members = Members::find($id);
        return view('anggota.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $members = Members::find($id);
          $rulles = [
            'nomor_anggota' => ['required'],
            'nik' => ['required', 'numeric'],
            'nama_anggota' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required'],
        ];
        $validators = Validator::make($request->all(),$rulles);
        if ($validators->fails()){
        return back()->withErrors($validators)->withInput();
        }
        // $members->fill($request->all());
         $members->nomor_anggota= $request->nomor_anggota;
         $members->nik= $request->nik;
         $members->nama_anggota= $request->nama_anggota;
         $members->no_hp= $request->no_hp;
         $members->email= $request->email;
         $members->save();
         return redirect()->to('anggota/index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $members = Members::withTrashed()->find($id);
        $members->forceDelete();
        return redirect()->to('anggota/index');
    }
}
