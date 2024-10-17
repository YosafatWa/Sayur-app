@extends('layouts.app') <!-- Ganti dengan layout yang Anda gunakan -->

@section('content')
<div class="container d-flex align-items-center justify-content-center" style="min-height: calc(100vh - 130px);"> <!-- Sesuaikan dengan tinggi navbar -->
    <div class="col-md-6">
        <h2 class="text-center mb-4">Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="shadow p-4 rounded bg-white">
            @csrf
            <div class="form-group mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required placeholder="Masukkan email">
            </div>

            <div class="form-group mb-4">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
            </div>

            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background-color: #f8f9fa; /* Warna latar belakang yang lembut */
        font-family: 'Arial', sans-serif;
    }

    h2 {
        font-weight: bold;
        color: #007bff; /* Warna biru untuk judul */
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Bayangan halus pada judul */
        margin-bottom: 20px; /* Jarak antara judul dan form */
    }

    .shadow {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Bayangan pada kotak form */
    }

    .btn-primary {
        background-color: #007bff; /* Warna biru */
        border-color: #007bff;
        transition: background-color 0.3s ease; /* Efek transisi saat hover */
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Warna lebih gelap saat hover */
        border-color: #0056b3;
    }

    .alert {
        margin-bottom: 20px; /* Jarak antara alert dan elemen lainnya */
    }
</style>
@endpush