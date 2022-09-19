@extends('main')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h3>All Products</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create')}}">Create New Product</a>
        </div>
    </div>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <form action="{{ route('products.destroy',$product->id)}}" method="POST">
                    @csrf
                    <a class="btn btn-primary" href="{{ route('products.show',$product->id) }}">View Product</a>
                    <a class="btn btn-success" href="{{ route('products.edit',$product->id) }}">Edit Product</a>
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection