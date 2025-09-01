@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bola</h2>
    <form method="POST" action="{{ route('bangunruang.bola') }}">
        @csrf
        <input type="number" name="r" class="form-control mb-2" placeholder="Jari-jari" value="{{ $r }}">
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
