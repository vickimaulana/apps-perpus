@extends('app')
@section('title', 'Update Books')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Update Book</div>
        </div>
        <div class="card-body">
            <form action="{{ route('buku.update', $book->id) }}" method="post">
                @csrf
                @method('PUT');
                <label for="" class="form-label">Lokasi</label>
                <select name="id_lokasi" class="form-select">
                    <option value="">--Pilih Lokasi--</option>
                    @foreach ($locations as $item)
                        <option {{ $item->id == $book->id_lokasi ? 'selected' : '' }} value="{{ $item->id }}">
                            {{ $item->kode_lokasi . '-' . $item->label . '-' . $item->rak }}
                        </option>
                    @endforeach
                </select>
                <label for="" class="form-label">Kategori</label>
                <select name="id_kategori" class="form-select">
                    <option value="">--Pilih Kategori--</option>
                    @foreach ($category as $item)
                        <option {{ $item->id == $book->id_kategori ? 'selected' : '' }} value="{{ $item->id }}">
                            {{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
                <label for="" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="{{ $book->judul }}">
                <label for="" class="form-label">Pengarang</label>
                <input type="text" class="form-control" name="pengarang" value="{{ $book->pengarang }}">
                <label for="" class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="{{ $book->penerbit }}">
                <label for="" class="form-label">Tahun Terbit</label>
                <input type="date" class="form-control" name="tahun_terbit" value="{{ $book->tahun_penerbit }}">
                <label for="" class="form-label">Keterangan</label>
                <textarea name="keterangan" cols="30" rows="10" class="form-control" value="{{ $book->keterangan }}"></textarea>
                <label for="" class="form-label">Stock Buku</label>
                <input type="number" min="1" max="1000" class="form-control" name="stock"
                    value="{{ $book->stock }}">
                <button type="submit" class="btn btn-primary mt-2">Kirim</button>
            </form>
        </div>
    </div>
@endsection
