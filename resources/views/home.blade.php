@extends('layouts.app')

@section('content')
    <div class="container">



    <div class="container">
    <h1 class="text-center mt-5">Request Quotation</h1>
    <form id="quotationForm">
        <div class="mb-3">
            <label for="serviceType">Select Quotation</label>
            <select id="serviceType" name="serviceType" class="form-select" required>
                <option value="">Please select</option>
                <option value="tarpaulin">Sticker</option>
                <option value="outdoorSignage">Outdoor Signage</option>
                <option value="indoorSignage">Indoor Signage</option>
                <option value="shirtPrinting">Shirt Printing</option>
                <option value="souvenir">Souvenir</option>
                <option value="tarpaulin">Tarpaulin</option>
                <option value="custom">Custom..</option>

            </select>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Upload File</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="tel" class="form-control" id="phone">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>

<div class="container">
        <h2 class="mb-4">Place Your Order</h2>
        <form>
            <div class="mb-3">
                <label for="fname" class="form-label">Full Name:</label>
                <input type="text" class="form-control" id="fname" required>
            </div>
            <div class="mb-3">
                <label for="pnumber" class="form-label">Personal Contact Number:</label>
                <input type="text" class="form-control" id="pnumber" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address:</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="payment" class="form-label">Payment Method:</label>
                <select class="form-select" id="payment" required>
                    <option value="">Select...</option>
                    <option value="credit">Credit Card</option>
                    <option value="debit">Debit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="paypal">COD</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Complete Address:</label>
                <input type="text" class="form-control" id="address" required>
            </div>
            <div class="mb-3">
                <label for="housenumber" class="form-label">House Number:</label>
                <input type="text" class="form-control" id="housenumber" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City:</label>
                <input type="text" class="form-control" id="city" required>
            </div>
            <div class="mb-3">
                <label for="region" class="form-label">Region:</label>
                <input type="text" class="form-control" id="region" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country:</label>
                <input type="text" class="form-control" id="country" required>
            </div>
            <div class="mb-3">
                <label for="zipcode" class="form-label">Zip Code:</label>
                <input type="text" class="form-control" id="zipcode" required>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    </div>



@endsection
