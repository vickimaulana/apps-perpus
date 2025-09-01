@extends('app')
@section('title', 'Dashboard')
@section('content')
  <div class="row">
    <div class="col-12">
        <div class="card">
            <div>
                @foreach ($errors->all() as $i )
                    <ul style="background-color: red">
                        <li>{{$i}}</li>
                    </ul>
                @endforeach
            </div>
            <div class="card-body">

                <h3 class="card-title">Create Anggota</h3>

                <form action="{{route('anggota.update', $members->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nomor_anggota" class="form-label">Nomor Anggota *</label>
                        <input type="text" name="nomor_anggota" id="nomor_anggota" value="{{ $members->nomor_anggota }}" readonly class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="nik" class="form-label">NIK *</label>
                        <input type="number" name="nik" id="nik" class="form-control"
                            value="{{ $members->nik ?? old('nik') }}" >
                    </div>
                    <div class="mb-3">
                        <label for="nama_anggota" class="form-label">Nama Anggota *</label>
                        <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" placeholder="Masukkan Nama Anggota"
                            value="{{ $members->nama_anggota ??  old('nama_anggota') }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">NO HP *</label>
                        <input type="tel" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No HP"
                            value="{{$members->no_hp ??  old('no_hp') }}" >
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email *</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Email"
                            value="{{$members->email ??  old('email') }}" >
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary mt-2">Kirim</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
