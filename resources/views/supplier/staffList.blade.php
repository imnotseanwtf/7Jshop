@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
            <h3>Staffs/Employees</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staffs as $staff)
                        <tr>
                            <td>{{ $staff->name }}</td>
                            <td>{{ $staff->email }}</td>
                            <td>
                                <a href="{{ url('/chatify/' . $staff->id) }}" class="btn btn-primary">Chat with them</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('#dataTable').DataTable()
    </script>
</div>
@endsection
