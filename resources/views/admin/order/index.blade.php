@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5" style="min-height: 70vh">
    <h1>Order List</h1>
    <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>
                        <img src="{{ asset('storage/' . $order->product->productImages->first()->image_path) }}" alt="" height="150" width="150">
                    </td>
                    <td>{{ $order->product->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->total, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $('#dataTable').DataTable()
    </script>
</div>
@endsection
