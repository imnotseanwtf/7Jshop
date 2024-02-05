@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Inventory
            </div>
            <div class="col text-end">
            <a href="{{ route('inventory.create',$inventoryId) }}" class="btn btn-primary">Add Item</a>
        </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <td>Image</td>
                                <td>Name</td>
                                <td>Desccription</td>
                                <td>Stock</td>
                                <td>Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        @foreach ($product->productImages as $image)
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt=""
                                                height="100" width="100">
                                        @endforeach
                                    </td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_description }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('prod.update', $product->id) }}" class="btn btn-primary mx-3">Edit</a>
                                        @admin
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger text-white"
                                                    onclick="confirmDelete(event)"><strong>Delete</strong></button>
                                            </form>
                                        @endadmin
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
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
                    text: "Are you sure to delete this REPORT permanently?",
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
@endsection
