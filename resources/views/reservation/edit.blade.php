@extends('main')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
@foreach ($errors->All() as $error)
    {{$error}}
</div>
@endforeach
@endif
<div class="reservation-edit">
    <form method="POST" action=" {{route('reservation.update',$reservation->id)}} ">
        @csrf
        @method('PUT')
        <div class="form-group">
          <div class="form-header">
            <h4>Make Modifications to your reservation :</h4>
            <a class="btn btn-primary" href="{{route('home')}}">Back Home</a>
          </div>
          <label for="name">Name :</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your full Name"
          value="{{$reservation->name}}">
        </div>
        <div class="form-group">
          <label for="email">Email Adress :</label>
          <input type="email" name="email" class="form-control" id="email" value="{{$reservation->email}}">
        </div>
        <div class="form-group">
            <label for="phone">Phone Number :</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{$reservation->phone}}">
        </div>
        <div class="form-group">
            <label for="guests">Number of guests :</label>
            <input type="number" name="guests"id="guests" value="1" class="form-control" value="{{$reservation->guests}}">
        </div>
        <div class="form-group">
            <label for="reservationdate">Reservation Date :</label>
            <input type="date" name="reservationdate" id="reservationdate" class="form-control" value="{{$reservation->reservationdate}}">
        </div>
        <div class="form-group">
            <label for="reservationtime">Reservation Time :</label>
            <input type="time" name="reservationtime" id="reservationtime" class="form-control" min="9:00" max="22:30" value="{{$reservation->reservationtime}}">
            <small>Openning Hours are from 9:00 to 22:30</small>
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </form>
</div>
@endsection