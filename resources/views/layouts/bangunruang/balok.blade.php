@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Balok</h2>
    <form method="POST" action="{{ route('bangunruang.balok') }}">
        @csrf
        <input type="number" name="p" class="form-control mb-2" placeholder="Panjang" value="{{ $p }}">
        <input type="number" name="l" class="form-control mb-2" placeholder="Lebar" value="{{ $l }}">
        <input type="number" name="t" class="form-control mb-2" placeholder="Tinggi" value="{{ $t }}">
        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>

    @if($volume !== null)
        <div class="alert alert-info mt-3">
            Volume = {{ $volume }} <br>
            Luas Permukaan = {{ $luas }}
        </div>
    @endif
</div>
@endsection
