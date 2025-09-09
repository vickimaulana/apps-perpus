@extends('app')
@section('title', "Tambah User Role")
@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Tambah User Role</h3>
            <form action="{{ route('user.updateRoles', $user->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="" class="form-label">Pilih Role</label>
                    <select name="roles[]" id="" class="form-control" multiple>
                        @foreach ($roles as $role)
                        <option {{$user->roles->contains($role->id) ? 'selected': ''  }} value="{{ $role->id }}">{{$role->name}}</option>
                        @endforeach
                        {{-- contains() --}}
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                    <a href="{{ url()->previous() }}" class="btn btn-succes">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
