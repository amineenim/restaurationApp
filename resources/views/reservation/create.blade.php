@extends('main'):
@section('content')
@if($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong>something went wrong with your request input
  <ul>
    @foreach($errors->All() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="form">
    <form method="POST" action="{{ route('reservation.store')}}">
        @csrf
        <div class="form-group">
          <div class="form-header">
            <h4>Thinking about visiting us, Reserve Your Table now !</h4>
            <a class="btn btn-primary" href="{{route('home')}}">Back Home</a>
          </div>
          <label for="name">Name :</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your full Name">
        </div>
        <div class="form-group">
          <label for="email">Email Adress :</label>
          <input type="email" name="email" class="form-control" id="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number :</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="guests">Number of guests :</label>
            <input type="number" name="guests"id="guests" value="1" class="form-control">
        </div>
        <div class="form-group">
            <label for="reservationdate">Reservation Date :</label>
            <input type="date" name="reservationdate" id="reservationdate" class="form-control">
        </div>
        <div class="form-group">
            <label for="reservationtime">Reservation Time :</label>
            <input type="time" name="reservationtime" id="reservationtime" class="form-control" min="9:00" max="22:30">
            <small>Openning Hours are from 9:00 to 22:30</small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('reservation.index')}}" class="btn btn-primary">Check all Reservations</a>
    </form>
</div>

@endsection