@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h4>Products List</h4>
        </div>
        <div class="col text-end">
            <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <td>Product Image</td>
                        <td>Product Name</td>
                        <td>Product Description</td>
                        <td>Price</td>
                        <td>Product Category</td>
                        @admin
                        <td>Action</td>
                        @endadmin
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                @foreach ($product->productImages as $image)
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="" height="100" width="100">
                                @endforeach
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td>{{ number_format($product->price, 2) }}</td>
                            <td>
                                @if ($product->status == 0)
                                    <strong style="color: green">This product is not been used</strong>
                                @elseif ($product->status == 1)
                                    <strong style="color: green">Normal Product</strong>
                                @elseif ($product->status == 2)
                                    <strong style="color: green">Main Product</strong>
                                @elseif ($product->status == 3)
                                    <strong style="color: green">Active Product</strong>
                                @endif
                            </td>
                            <td class="d-flex">
                            @supplier
                                <a href="{{ route('mainProduct', $product->id) }}" class="btn btn-primary me-2">Main Product</a>
                                <a href="{{ route('normalProduct', $product->id) }}" class="btn btn-secondary me-2">Normal Product</a>
                                <a href="{{ route('activeProduct', $product->id) }}" class="btn btn-success text-white me-2"><strong>Active Product</strong></a>
                            @endsupplier
                            @admin
                                <a href="{{ route('mainProduct', $product->id) }}" class="btn btn-primary me-2">Main Product</a>
                                <a href="{{ route('normalProduct', $product->id) }}" class="btn btn-secondary me-2">Normal Product</a>
                                <a href="{{ route('activeProduct', $product->id) }}" class="btn btn-success text-white me-2"><strong>Active Product</strong></a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger text-white" onclick="confirmDelete(event)"><strong>Delete</strong></button>
                                </form>
                            @endadmin
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();

            window.confirmDelete = function(e) {
                e.preventDefault();
                const target = e.target; // Get the element that triggered the event
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure to delete this PRODUCT permanently?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Find the closest form and submit it
                        $(target).closest('form').submit();
                    }
                });
            }
        });
    </script>
</div>
@endsection
