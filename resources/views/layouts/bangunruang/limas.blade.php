@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Limas Segi Empat</h2>
    <form method="POST" action="{{ route('bangunruang.limas') }}">
        @csrf
        <input type="number" name="s" class="form-control mb-2" placeholder="Sisi Alas" value="{{ $s }}">
        <input type="number" name="t" class="form-control mb-2" placeholder="Tinggi" value="{{ $t }}">
        <button type="submit" class="btn btn-primary">Hitung</button>
    </form>

    @if($volume !== null)
        <div class="alert alert-info mt-3">
            Volume = {{ $volume }}
        </div>
    @endif
</div>
@endsection
