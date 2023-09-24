@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">Add Product</h1>
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
        <div class="col-lg-12 mt-5">
          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form">
              @csrf
              <div class="row"> 
                  <div class="col-lg-8">
                      <div class="form-group">
                          <input class="form-control" type="text" name="name" placeholder="Enter Product" aria-label="default input example" required>
                      </div>
                  </div>
                  <div class="col-lg-4"> 
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                      <button type="submit" class="btn btn-success">Submit</button>
                  </div>
              </div>
          </form>     
      </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-success  table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $key => $product)
                      <tr>
                          <th scope="row">{{ ++$key }}</th>
                          <td>{{ $product->name }}</td>
                          <td>
                            <a href="{{ route('product.delete' , $product->id) }}" class="btn btn-danger">Delete</a>

                            <a href="{{ route('products.edit' , $product->id) }}"class="btn btn-warning btn-sm">Edit</a>
                          </td>
                        </tr>   
                      @endforeach             
                  </tbody>
                  </table>
            </div>
        </div>
    </div>
  </div> 
@endsection

<style>
    .page-title{
        padding-top: 2vh;
        font-size: 3rem;
        color: #23eb1c;
    }
</style>    

