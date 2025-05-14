<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Showcase</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            padding-top: 56px;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 20px;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .price {
            font-weight: bold;
            color: #0d6efd;
        }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://via.placeholder.com/1920x600');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<!-- Navbar -->
@include('navbar')

<!-- Product Cards -->
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
{{--    Products Section  --}}
    <h2 class="mb-4">Products</h2>
    <div class="row">
        @foreach($products as $product)
            <x-product_card :product="$product"/>
        @endforeach


    </div>
{{ $products->links() }}
</div>





<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>
