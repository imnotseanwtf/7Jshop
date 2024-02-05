@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h3>Edit Sales Report</h3>
    </div>
    <form action="{{ route('sales-report.update', $salesReport->id ) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="card-body row ">
        {{-- <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="date" value="{{  }}" class="form-control">
        </div> --}}
        <div class="col mt-2">
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="description" placeholder="Description" value="{{ $salesReport->description }}" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="">Amount</label>
                <input type="number" name="amount" placeholder="Amount" value="{{ $salesReport->amount }}" class="form-control">
            </div>
        </div>
        <div class="col mt-2">
            <div class="form-group">
                <label for="">Downpayment</label>
                <input type="number" name="down_payment" placeholder="Downpayment" value="{{ $salesReport->down_payment }}" class="form-control">
            </div>
            <div class="form-group mt-2">
                <label for="">Status</label> <br>
                <input type="checkbox" name="status" value="1" {{ $salesReport->status == 1 ? 'checked' : '' }}><span style="margin-right: 50px">Half Paid</span>
                <input type="checkbox" name="status" value="2" {{ $salesReport->status == 2 ? 'checked' : '' }} ><span>Fully Paid</span>
            </div>
            <button type="submit" class="btn btn-primary mt-3" style="float: right">Submit</button>
        </div>
    </div>
</form>
</div>

@endsection
