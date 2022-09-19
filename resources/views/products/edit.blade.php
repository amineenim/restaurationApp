@extends('main')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <Strong>Whoops! Something went wrong with ur input</Strong>
    <ul>
        @foreach ($errors->All() as $error )
        <li> {{ $error }}  </li>
        @endforeach
    </ul>
</div>
@endif

    
<div class="form">
    <div class="form-header">
    <h3>Edit Your Product</h3>
    <div>
        <a href="{{ route('products.index')}}"  class="btn btn-success-outline">Cancel</a>
    </div>
    <form method="POST" action="{{ route('products.update',$product->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Type the new Name :</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name" value="{{$product->name}}">
        </div>
        <div class="form-group">
          <label for="description">Type the new Product Description :</label>
          <textarea class="form-control" name="description" id="description" >{{$product->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="price">set your new Price :</label>
            <input type="text" name="price" id="price" value="{{$product->price}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection