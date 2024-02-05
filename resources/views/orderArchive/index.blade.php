@extends('layouts.app')

@section('content')

    <div class="container-fluid mt-5" style="min-height: 70vh">
        <h1>Order List</h1>
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product</th>
                    <th>User</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    @admin
                        <th>Action</th>
                    @endadmin
                </tr>
            </thead>
            <tbody>
                @foreach ($archives as $archive)
                    <tr>
                        <td>
                            <img src="{{ asset('storage/' . $archive->product->productImages->first()->image_path) }}"
                                alt="" height="150" width="150">
                        </td>
                        <td>{{ $archive->product->product_name }}</td>
                        <td>{{ $archive->user->name }}</td>
                        <td>{{ $archive->quantity }}</td>
                        <td>{{ number_format($archive->total, 2) }}</td>
                        @admin
                            <td class="">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{ route('order.restore', $archive->id) }}"
                                        class="btn btn-primary me-2">Restore</a>
                                    <form action="{{ route('order.destroy', $archive->id) }}" method="POST" class="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class=" btn btn-danger text-white"
                                            onclick="confirmDelete(event)"><strong>Delete</strong></button>
                                    </form>
                                </div>
                            </td>
                        @endadmin
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();

                window.confirmDelete = function(e) {
                    e.preventDefault();
                    const target = e.target; // Get the element that triggered the event
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Are you sure to delete this ORDER permanently?",
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
