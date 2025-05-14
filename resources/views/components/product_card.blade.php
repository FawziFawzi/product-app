@props(['product'])
<div class="col-md-4 col-sm-6">
    <div class="card product-card">
        <img src="{{ asset('/storage/'.$product->image) }}" class="card-img-top" alt="Product 1">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->category }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <span class="price">{{ $product->price }}$</span>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">See Details</a>
                @auth
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                <form class="d-flex" action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
</div>
