@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Audit Table
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Status</td>
                                <td>Ip Address</td>
                                <td>Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($audits as $audit)
                                <tr>
                                    <td>{{ $audit->user->name }}</td>
                                    <td>
                                        @if ($audit->new_values['status'] == 2)
                                            Logout
                                        @elseif ($audit->new_values['status'] == 1)
                                            Login
                                        @endif
                                    </td>
                                    <td>
                                        {{ $audit->ip_address }}
                                    </td>
                                    <td>
                                        {{ $audit->created_at }}
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
        });
    </script>
@endsection
