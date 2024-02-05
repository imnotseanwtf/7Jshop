@extends('layouts.app')

@section('content')

<div class="container" style="min-height: 65vh; margin-top: 7%">
    <h1 class="text-center">Update Items</h1>
    <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @METHOD('PUT')
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="product_name" placeholder="Product Name" required value="{{ $product->product_name }}">
        </div>
        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="productImage" name="product_image[]" required multiple>
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock" required value="{{ $product->stock }}">
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <textarea class="form-control" id="productDescription" name="product_description" placeholder="Product Description" rows="3" required>{{ $product->product_description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="Price" required value="{{ $product->price }}">
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>


@endsection
