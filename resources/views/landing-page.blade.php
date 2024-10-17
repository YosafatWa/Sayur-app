@extends('layouts.app')

@section('title', 'Landing Page || Toko Sayur Asep')

@section('content')
<section id="home" class="d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" style="margin-top: 160px;">
                <h1 class="display-4 fw-bold mb-4">Selamat Datang di Toko Sayur Asep</h1>
                <p class="lead mb-4">Kami menyediakan sayuran segar dan berkualitas tinggi langsung dari petani lokal untuk meja makan Anda.</p>
                <a href="#products" class="btn btn-primary btn-lg">Lihat Produk Kami</a>
            </div>
            <div class="col-lg-6">
                <div class="placeholder-img"></div> <!-- Placeholder image area -->
            </div>
        </div>
    </div>
</section>

<section id="about" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="margin-top: 130px;">Mengapa Memilih Kami?</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">🌿</div>
                    <h3>Selalu Segar</h3>
                    <p>Sayuran kami dipetik langsung dari kebun setiap hari.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">🚚</div>
                    <h3>Pengiriman Cepat</h3>
                    <p>Kami mengirim pesanan Anda dalam waktu 24 jam.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">💚</div>
                    <h3>100% Organik</h3>
                    <p>Semua produk kami bebas dari bahan kimia berbahaya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="products" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5">Produk Unggulan Kami</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Sayuran Hijau">
                    <div class="card-body">
                        <h5 class="card-title">Sayuran Hijau</h5>
                        <p class="card-text">Berbagai jenis sayuran hijau segar untuk nutrisi optimal.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Buah-buahan Segar">
                    <div class="card-body">
                        <h5 class="card-title">Buah-buahan Segar</h5>
                        <p class="card-text">Buah-buahan manis dan lezat langsung dari kebun.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="/api/placeholder/400/300" class="card-img-top" alt="Paket Salad">
                    <div class="card-body">
                        <h5 class="card-title">Paket Salad</h5>
                        <p class="card-text">Paket salad siap saji untuk gaya hidup sehat Anda.</p>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Hubungi Kami</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email Anda" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Pesan Anda" required></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Kirim Pesan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<footer class="bg-dark text-white text-center py-3">
    <div class="container">
        <p>&copy; 2024 Toko Sayur Asep. All rights reserved.</p>
    </div>
</footer>

@endsection

@push('style')
<style>
    :root {
        --dark-blue: #00264d;
        --light-blue: #3366cc;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .navbar {
        background-color: var(--dark-blue);
    }

    .hero {
        background-color: var(--dark-blue);
        color: white;
        padding: 120px 0;
        width: 100%;
        min-height: 80vh; /* Set minimum height for the hero section */
        display: flex;
        align-items: center; /* Vertically center the content */
    }

    .feature-icon {
        font-size: 3rem;
        color: var(--light-blue);
    }

    .btn-primary {
        background-color: var(--light-blue);
        border-color: var(--light-blue);
    }

    .btn-primary:hover {
        background-color: var(--dark-blue);
        border-color: var(--dark-blue);
    }

    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .placeholder-img {
        width: 100%; /* Width for the placeholder */
        height: 100%; /* Height for the placeholder */
        background-color: #ccc; /* Placeholder background color */
        border-radius: 0.5rem; /* Rounded corners for the placeholder */
    }
</style>
@endpush

@push('script')
<script>
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush
