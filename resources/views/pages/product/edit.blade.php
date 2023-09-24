
@extends('layouts.app')
@section('content')
<div class="card">
	<div class="card-header text-center page-title"  >Edit Product
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
	<div class="card-body">
		<form  method="post" action="{{ route('products.update', $product->id)}}"  enctype="multipart/form-data">
			@csrf
			@method('PUT')
			<div class="row mb-3">
				<label class="col-sm-2 col-label-form">Product Name</label>
				<div class="col-sm-10">
					<input type="text" name="name" class="form-control" value="{{ $product->name }}" />
				</div>
			</div>		
			<div class="text-center">			
				<input type="submit" class="btn btn-primary" value="Update" />
			</div>	
		</form>
	</div>
</div>
@endsection('content')

<style>
    .page-title{
        padding-top: 2vh;
        font-size: 2rem;
        color: #23eb1c;
    }
</style>
