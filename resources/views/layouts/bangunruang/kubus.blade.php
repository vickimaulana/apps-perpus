@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kubus</h2>
    <form method="POST" action="{{ route('bangunruang.kubus') }}">
        @csrf
        <input type="number" name="sisi" class="form-control mb-2" placeholder="Sisi" value="{{ $sisi }}">
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
