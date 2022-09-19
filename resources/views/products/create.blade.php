@extends('main');
@section('content')


@if($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>, there were some problems with ur input.<br>
        <ul>
            @foreach ($errors->All() as $error)
                <li>{{$error}}</li>  
            @endforeach
        </ul>
    </div>
@endif
<div class="form">
    <div class="form-header">
    <h3>Add New Product</h3>
    <a href="{{ route('products.index')}}"  class="btn btn-success-outline">Back</a>
    </div>
    <form method="POST" action="{{ route('products.store')}}">
        @csrf
        <div class="form-group">
          <label for="name">Name :</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Product Name">
        </div>
        <div class="form-group">
          <label for="description">Description :</label>
          <textarea class="form-control" name="description" id="description" >Product description...</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price :</label>
            <input type="text" name="price" id="price">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


@endsection
