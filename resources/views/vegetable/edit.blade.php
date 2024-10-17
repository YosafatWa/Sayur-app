@extends('layouts.app')

@section('title', 'Edit Sayur || Toko Sayur Asep')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Edit Sayur</h1>
    <form action="{{ route('vegetable.update', $vegetable->id) }}" method="POST" class="shadow p-4 rounded bg-light">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nama Sayur</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $vegetable->name }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $vegetable->price }}" required>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $vegetable->stock }}" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Update Sayur</button>
    </form>
</div>
@endsection
