@extends('layouts.app')

@section('title', 'Tambah Akun')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Tambah Akun</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
                <option value="user">User</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
    
        <button type="submit" class="btn btn-primary mt-3">Tambah Akun</button>
    </form>    
</div>
@endsection
