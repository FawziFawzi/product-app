<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details | ShopEase</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
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
            box-shadow: 0 5px 15px rgba(0,0,0,.1);
            border: none;
        }
        .product-img {
            height: 400px;
            object-fit: contain;
            background-color: #f9f9f9;
        }
        .price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0d6efd;
        }

        .specs-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }


    </style>
</head>
<body>
@include('navbar')

<!-- Product Details Section -->
<div class="container py-5">


    <div class="row g-4">
        <!-- Product Images Column -->
        <div class="col-lg-6">

                <img src="{{ asset('/storage/'.$product->image) }}" class="card-img-top product-img p-4" alt="Wireless Headphones Pro">

        </div>

        <!-- Product Info Column -->
        <div class="col-lg-6">
            <div class="card product-card h-100">
                <div class="card-body">
                    <h1 class="h2">{{ $product->name }}</h1>
                        @if($product->status)
                        <span class="badge bg-success ms-3"><i class="bi bi-check-circle">status: </i> In Stock</span>
                        @else
                        <span class="badge bg-danger ms-3"><i class="bi bi-cross-circle">status:</i> Out Of Stock</span>
                    @endif

                    <p class="price">Price: ${{ $product->price }}</p>

                    <span>Category: {{ $product->category }}</span>
                    </div>



                </div>
            </div>
        </div>
    </div>

</div>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
