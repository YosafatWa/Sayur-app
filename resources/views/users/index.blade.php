@extends('layouts.app')

@section('title', 'Kelola Akun')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Kelola Akun</h1>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah Akun</a>
    
    @if($users->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            Tidak ada data akun yang tersedia.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark text-center align-middle">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center align-middle">
                    @foreach($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->role) }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>                                 
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        max-width: 1000px;
    }
    h1 {
        font-weight: bold;
        color: #343a40;
        text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
    }
    .table-responsive {
        border-radius: 0.5rem;
        overflow: hidden;
    }
    .table {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 0;
    }
    .table-hover tbody tr:hover {
        background-color: #e9ecef;
        transition: background-color 0.3s ease;
    }
</style>
@endpush