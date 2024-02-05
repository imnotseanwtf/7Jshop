@extends('layouts.app')

@section('content')

<div class="container-fluid card">
    <div class="card-header">
        <h2>Users</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Email</label>
                <input type="email" name="email" placeholder="Email" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
</div>

@endsection
