@extends('layouts.app')

@section('title', 'Daftar Sayur || Toko Sayur Asep')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Daftar Sayur</h1>
    <a href="{{ route('vegetable.create') }}" class="btn btn-primary mb-3">Tambah Sayur</a>
    
    @if($vegetables->isEmpty())
        <div class="alert alert-warning text-center" role="alert">
            Tidak ada data sayur yang tersedia.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark text-center align-middle">
                    <tr>
                        <th>No.</th>
                        <th>Nama Sayur</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center align-middle">
                    @foreach($vegetables as $index => $vegetable)
                        <tr>
                            <td>{{ ($vegetables->currentPage() - 1) * $vegetables->perPage() + $loop->iteration }}</td>
                            <td>{{ $vegetable->name }}</td>
                            <td>Rp {{ number_format($vegetable->price, 0, ',', '.') }}</td>
                            <td class="{{ $vegetable->stock < 3 ? 'bg-danger text-white' : '' }}">
                                {{ $vegetable->stock }}
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('vegetable.edit', $vegetable->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                    <form action="{{ route('vegetable.destroy', $vegetable->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?');">
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

        <!-- Paginasi -->
        <div class="d-flex justify-content-end mt-3">
            {{ $vegetables->links() }}
        </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
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

    .btn {
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #e0a800;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    .alert {
        border-radius: 0.5rem;
    }
</style>
@endpush