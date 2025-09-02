@extends('app')
@section('title', "Location of Books")
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Manage of Location's Books</div>
    </div>
    <div class="card-body">
        <a href="{{ route('lokasi.create') }}" class="btn btn-primary mt-2 mb-2">Create</a>
        <div class="table teble-responsive">
            <table class="table table-bordered text-center">
                <tr>
                    <th>No</th>
                    <th>Kode_Lokasi</th>
                    <th>Label</th>
                    <th>Rak</th>
                    <th>Actions</th>
                </tr>
                @php
                    $no= 1;
                @endphp
                @foreach ($locations as $item )

                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->kode_lokasi}}</td>
                    <td>{{$item->label}}</td>
                     <td>{{$item->rak}}</td>
                    <td>
                        <a href="{{ route('lokasi.edit', $item->id) }}" class="btn btn-success">Edit</a>
                        <form action="{{ route('lokasi.destroy', $item->id) }}" method="post" style="display:inline" onclick="return confirm('Yakin ingin Delete ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
