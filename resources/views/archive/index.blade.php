@extends('layouts.app')

@section('content')
    <div class="contaienr-fluid card">
        <div class="card-header row">
            <div class="col">
                <h4>Archives</h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <td>Image</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Service Type</td>
                            <td>Quantity</td>
                            <td>Description</td>
                            <td>Phone Number</td>
                            @if (auth()->user()->hasRole('admin') ||
                                    auth()->user()->hasRole('staff'))
                                <td>Action</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($archives as $archive)
                            <tr>
                                <td>
                                @if ($archive->quotationImages->isNotEmpty())
                                        <img src="{{ asset('storage/' . $archive->quotationImages->first()->image) }}"
                                            alt="" height="150" width="150">
                                    @endif
                                    </td>
                                <td>{{ $archive->name }}</td>
                                <td>{{ $archive->email }}</td>
                                <td>{{ $archive->quotation }}</td>
                                <td>{{ $archive->quantity }}</td>
                                <td>{{ $archive->description }}</td>
                                <td>{{ $archive->phone_number }}</td>
                                @if (auth()->user()->hasRole('admin') ||
                                        auth()->user()->hasRole('staff'))
                                    <td class="d-flex">
                                        <form action="{{ route('qoutation.restore', $archive->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-success me-2" type="submit">Restore</button>
                                        </form>
                                        @admin
                                            <form action="{{ route('quotation.destroy', $archive->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger text-white"
                                                    onclick="confirmDelete(event)"><strong>Delete</strong></button>
                                            </form>
                                        @endadmin
                                    </td>
                                @endif
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
                        text: "Are you sure to delete this archive permanently?",
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
