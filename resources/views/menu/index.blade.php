@extends('main')
@section('content')
<div class="menu-header">
    <p>OUR MENU</p>
</div>
<section>
    @if($message = Session::get('success'))
       <div class="alert alert-success">
          <p>{{ $message }}</p>
       </div>
    @endif
    <br/>
    <p>API data will be here</p>
</section>
@endsection