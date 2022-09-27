@extends('main')

@section('content')
@if($message = Session::get('deleted'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="row justify-content-center">
    <div class="home-body">
        
    </div>
</div>
@endsection
