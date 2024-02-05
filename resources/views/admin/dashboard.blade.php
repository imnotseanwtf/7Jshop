@extends('layouts.app')

@section('content')

<div class="container-fluid" style="min-height: 70vh">
    <h1 class="my-5">Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Users</h2>
                    <p class="card-text">View and manage all registered users in page ({{ $users }})  </p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">View Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Orders</h2>
                    <p class="card-text">View and manage all orders made by users ({{ $orders }}) </p>
                    <a href="{{ route('order.index') }}" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Products</h2>
                    <p class="card-text">View and manage all products in the inventory ({{ $products }}) </p>
                    <a href="{{ route('product.index') }}" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Messages</h2>
                    <p class="card-text">View and manage all messages from customers</p>
                    <a href="{{ url('chatify') }}" class="btn btn-primary">View Messages</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Suppliers</h2>
                    <p class="card-text">View and manage all suppliers  ({{ $suppliers }})</p>
                    <a href="{{ route('users.suppliers') }}" class="btn btn-primary">View Supplier</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Sales Report</h2>
                    <p class="card-text">View and manage all your sales ({{ $sales }}) </p>
                    <a href="{{ route('sales-report.index') }}" class="btn btn-primary">View Sales</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
