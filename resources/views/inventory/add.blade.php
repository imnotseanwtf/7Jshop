@extends('layouts.app')

@section('content')

<div class="container" style="min-height: 65vh; margin-top: 7%">
    <h1 class="text-center">Add Product</h1>
    <form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{$inventoryId}}">
        <div class="mb-3">
            <label for="productName" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name="product_name" placeholder="Product Name" required>
        </div>
        <div class="mb-3">
            <label for="productImage" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="productImage" name="product_image[]" required multiple>
        </div>
        <div class="mb-3">
            <label for="productName" class="form-label">Stock</label>
            <input type="number" class="form-control"  name="stock" placeholder="Stock" required>
        </div>
        <div class="mb-3">
            <label for="productDescription" class="form-label">Product Description</label>
            <textarea class="form-control" id="productDescription" name="product_description" placeholder="Product Description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="productName" class="form-label">Price</label>
            <input type="number" class="form-control" id="productName" name="price" placeholder="Price" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
</div>

@endsection
