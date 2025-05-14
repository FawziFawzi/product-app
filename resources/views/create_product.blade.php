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


        .specs-list li {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
        }

    </style>
</head>
<body>
<!-- Navbar (Same as original) -->
@include('navbar')

<!-- Product Details Section -->
<div class="container py-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form class="form-horizontal" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <fieldset>

            <!-- Form Name -->
            <legend>Add New PRODUCT</legend>


            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_name">PRODUCT NAME</label>
                <div class="col-md-4">
                    <input id="product_name" name="name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text" value="{{ old('name') }}">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="product_name_fr">PRODUCT Category</label>
                <div class="col-md-4">
                    <input id="product_name_fr" name="category" placeholder="PRODUCT Category" class="form-control input-md" required="" type="text" value="{{ old('category') }}">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="available_quantity">Price</label>
                <div class="col-md-4">
                    <input id="price" name="price" placeholder="Price" class="form-control input-md" required type="text" value="{{ old('price') }}">

                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" >Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="1" checked>
                    <label class="form-check-label" for="status">
                        Available
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" id="status" value="0">
                    <label class="form-check-label" for="status">
                        InAvailable
                    </label>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload product photo</label>
                    <input class="form-control" name="image" type="file" id="formFile">
                </div>
            </div>

            <button type="submit" class="btn btn-secondary">Add Product</button>



        </fieldset>
    </form>



<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
