@extends('layouts.app')

@section('content')

<div class="container-fluid" style="min-height: 70vh">
    <h1 class="my-5">Supplier Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Orders</h2>
                    <p class="card-text">Your current orders are ({{ auth()->user()->order->count() }})</p>
                    <a href="{{ route('order.index') }}" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h2 class="card-title">Messages</h2>
                    <p class="card-text">View and manage all messages from customers</p>
                    <a href="{{ url('chatify') }}" class="btn btn-primary">View Messages</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
