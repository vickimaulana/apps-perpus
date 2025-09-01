@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Pilih Bangun Ruang</h1>
    <ul>
        <li><a href="{{ route('bangunruang.kubus') }}">Kubus</a></li>
        <li><a href="{{ route('bangunruang.balok') }}">Balok</a></li>
        <li><a href="{{ route('bangunruang.limas') }}">Limas Segi Empat</a></li>
        <li><a href="{{ route('bangunruang.tabung') }}">Tabung</a></li>
        <li><a href="{{ route('bangunruang.bola') }}">Bola</a></li>
    </ul>
</div>
@endsection
