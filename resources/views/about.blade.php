@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <form action="{{ route('about.update', $aboutUs->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row" style="margin-top: 10%">
            <div class="col-1"></div>
            <div class="col-6">
                <h1 style="font-size: 90px; font-weight: 700; color: rgb(3, 3, 124)">About Us</h1>
                <textarea class="form-control" name="text_header">{{ $aboutUs?->text_header }}</textarea>
                {{-- <h1 style="color: rgb(3, 3, 124); font-weight: 600" class="mt-3"></h1> --}}
                <input type="text" name="header" value="{{ $aboutUs?->header }}" class="form-control mt-4">
                <textarea class="form-control mt-4" name="second_text">{{ $aboutUs?->second_text }}</textarea>
                <input type="file" name="image" class="form-control mt-4">
                <button type="submit" class="btn btn-primary mt-5" style="float: right">Submit</button>
            </div>
            <div class="col-5">
                <img src="{{ asset('storage/' . $aboutUs?->image) }}" alt="" height="700" width="850">
            </div>
        </div>

    </form>
</div>

@endsection
