@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h1>Top Customers</h1>
        </div>
        <div class="col text-end">
            <a href="{{ route('top-customer.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Comment</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($topCustomers as $topCustomer)
                        <tr>
                            <td>{{ $topCustomer->name }}</td>
                            <td>{{ $topCustomer->comment }}</td>
                            <td>
                                <img src="{{ asset('storage/'. $topCustomer->image) }}" alt="" height="150" width="150">
                            </td>
                            <td>
                                <form action="{{ route('top-customer.destroy', $topCustomer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger text-white" onclick="confirmDelete(event)"><strong>Delete</strong></button>
                                </form>
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
                    text: "Are you sure to delete this Top Customer permanently?",
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
