@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tabung</h2>
    <form method="POST" action="{{ route('bangunruang.tabung') }}">
        @csrf
        <input type="number" name="r" class="form-control mb-2" placeholder="Jari-jari" value="{{ $r }}">
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
