@extends('app')

@section('title', 'Manage Anggota')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            Manage Anggota
        </div>
    </div>
    <div class="card-body">
        <div class="table table-responsive">
            <a href="{{ route('anggota.index') }}" class="btn btn-primary mt-2 mb-2">Back</a>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>No Anggota</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                @foreach ($members_r as $no => $items)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $items->nomor_anggota }}</td>
                    <td>{{ $items->nama_anggota }}</td>
                    <td>{{ $items->email }}</td>
                    <td>
                        <a href="{{ route('anggota.restore', $items->id)}}" class="btn btn-warning">Restore</a>
                        <form action="{{ route('anggota.destroy', $items->id) }}" method="post"  onclick="return confirm('Ingin Delete?')" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
