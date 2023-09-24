@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="page-title">All Products</h1>
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
<div class="col-lg-12 ">
  @auth
   <p>Welcome, {{ auth()->user()->name }}!</p>
  @endauth
</div>
        <div class="col-lg-12 ">
            <div>
                <table class="table table-success  table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product</th>
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
                            <a href="{{ route('products.edit' , $product->id) }}"class="btn btn-warning ">Edit</a>
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

