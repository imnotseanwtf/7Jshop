@extends('layouts.app')

@section('content')

<div class="container mt-5" style="min-height: 70vh">
    <h4>Order</h4>
    <div class="mt-5 row">
        <div class="col">
            <img src="{{ asset('storage/' . $product->productImages->first()->image_path) }}" alt="" height="400" width="400">
        </div>
        <div class="col mt-4">
            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <h3>{{ $product->product_name }}</h3>
                <h5>{{ $product->product_description }}</h5>
                <h2 style="color: red" id="price">{{ number_format($product->price, 2) }}</h2>
                <div class="row">
                    <div class="col">
                        <div class="col form-group mt-3">
                            <label for="">Quantity</label>
                            <input type="number" placeholder="Quantity" min="1" name="quantity" id="quantity" class="form-control">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-3">
                            <label for="">Total</label>
                            <h2 id="total"></h2>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-4" style="width: 100%" type="submit">Order</button>
            </form>
        </div>
    </div>
    <script>
        $(() => {
            $('#quantity').on('input', function() {
                const priceText = $('#price').text().replace(/,/g, ''); // Remove commas from the price
                const price = parseFloat(priceText); // Convert the text to a floating point number
                const quantity = parseInt($('#quantity').val(), 10);

                // Make sure both price and quantity are valid numbers before calculating
                if (!isNaN(price) && !isNaN(quantity)) {
                    const total = price * quantity;
                    $('#total').text('P ' + total.toFixed(2)); // Update the total text
                }
            });
        });

    </script>
</div>
@endsection
