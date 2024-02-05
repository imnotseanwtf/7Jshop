@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h3>Top Customer</h3>
    </div>

    <div class="card-body">
       <form action="{{ route('top-customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" placeholder="Name">
        </div>
        <div class="form-group mt-3">
            <label for="">Comment</label>
            <textarea name="comment" class="form-control" id="" rows="2"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="">Image</label>
            <input type="file" name="image" class="form-control" placeholder="Name">
        </div>
        <button class="btn btn-primary mt-4">Submit</button>
       </form>
    </div>
</div>

@endsection
