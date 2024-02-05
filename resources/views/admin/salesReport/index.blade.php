@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header row">
        <div class="col">
            <h3>Sales Report</h3>
        </div>
        <div class="col text-end">
            <a href="{{ route('sales-report.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <td>Date</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @php $previousMonth = ''; @endphp
                    @foreach ($salesReports as $salesReport)
                        @php 
                            $currentMonth = date('F Y', strtotime($salesReport->date)); 
                            $showMonth = ($currentMonth != $previousMonth) ? $currentMonth : ''; 
                            $previousMonth = $currentMonth; 
                        @endphp
                        @if ($showMonth)
                            <tr>
                                <td>{{ $showMonth }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('sales-report.view', $salesReport->id) }}" class="btn btn-primary me-2">View</a>
                                    @admin
                                    <form action="{{ route('sales-report.delete', $salesReport->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger text-white" onclick="confirmDelete(event)"><strong>Delete</strong></button>
                                    </form>
                                    @endadmin
                                </td>
                            </tr>
                        @endif
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
</div>
@endsection
