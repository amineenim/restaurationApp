@extends('main')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="single-product">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">{{ $product->name }}</h5>
          <p class="card-text">{{ $product->description }}</p>
          <a href="{{route('products.index') }}" class="btn btn-primary">Go To Paroducts Page</a>
        </div>
    </div>
</div>
@endsection