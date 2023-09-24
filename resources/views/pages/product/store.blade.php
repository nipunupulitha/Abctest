@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-lg-12 text-center">
        <h1 class="page-title">Create Product</h1>
    </div>
    <div>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
 
@endif
    <form method="POST" action="{{ route('producta.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" id="category" class="form-control" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>
@endsection
 
<style>
    .page-title{
        padding-top: 3vh;
        font-size: 2rem;
        color: #23eb1c;
    }
</style>