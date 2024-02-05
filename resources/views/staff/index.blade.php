@extends('layouts.app')

@section('content')
    <div class="contaienr-fluid card">
        <div class="card-header row">
            <div class="col">
                <h4>Quotations</h4>
            </div>
            <div class="col text-end">
                @if (auth()->user()->hasRole('admin') ||
                        auth()->user()->hasRole('staff'))
                    <a href="{{ route('archive.table') }}" class="btn btn-primary">Archive</a>
                @endif
                <a href="{{ route('quotation.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                            <td>Status</td>
                            @if (auth()->user()->hasRole('admin') ||
                                    auth()->user()->hasRole('staff'))
                                <td>Action</td>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations as $quotation)
                            <tr>
                                <td>
                                    @if ($quotation->quotationImages->isNotEmpty())
                                        <img src="{{ asset('storage/' . $quotation->quotationImages->first()->image) }}"
                                            alt="" height="150" width="150">
                                    @endif
                                </td>
                                <td>{{ $quotation->name }}</td>
                                <td>{{ $quotation->email }}</td>
                                <td>{{ $quotation->quotation }}</td>
                                <td>{{ $quotation->quantity }}</td>
                                <td>{{ $quotation->description }}</td>
                                <td>{{ $quotation->phone_number }}</td>
                                <td>
                                    @if ($quotation->status == 0)
                                        <strong class="text-warning">Pending</strong>
                                    @elseif ($quotation->status == 1)
                                        <strong class="text-danger">Cancelled</strong>
                                    @else
                                        <strong class="text-success">Success</strong>
                                        @if($quotation->file)
                                        <div>
                                        <a href="{{route('download.pdf', $quotation->id)}}" class="btn btn-primary">Download PDF</a>
                                        </div>
                                        @else
                                        @endif
                                    @endif
                                </td>
                                @if (auth()->user()->hasRole('admin') ||
                                        auth()->user()->hasRole('staff'))
                                    <td class="d-flex">
                                        <div class="">
                                            <a href="{{ route('quotation.cancel', $quotation->id) }}"
                                                class="btn btn-secondary me-2">Cancel</a>
                                        </div>
                                        <div class="">
                                            <form action="{{ route('quotation.complete', $quotation->id) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <button class="btn btn-success me-2" type="submit">Complete</button>
                                                <input type="file" class="form-control mt-2" name="file" required>
                                                @error('file')
                                                    <div class="text-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </form>
                                        </div>
                                        @admin
                                            <form action="{{ route('quotation.archive', $quotation->id) }}" method="POST">
                                                @csrf
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
                        text: "Are you sure to delete this Quotation permanently?",
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
