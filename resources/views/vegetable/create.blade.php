@extends('layouts.app')

@section('title', 'Tambah Sayur || Toko Sayur Asep')

@section('content')
    <div class="container">
        <h2 class="mb-4">Tambah Sayur Baru</h2>
        <form action="{{ route('vegetable.store') }}" method="POST" class="card p-5">
            @csrf
            @if (session('success'))
                <div class="alert alert-success"> {{ session('success') }} </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Nama Sayur:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Harga Sayur:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required min="0" step="0.01">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stock" class="col-sm-2 col-form-label">Stok Tersedia:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required min="0">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </div>
        </form>
    </div>
@endsection
