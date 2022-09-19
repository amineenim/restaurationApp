@extends('main')
@section('content')
<div class="reservation">
    @if($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
     @endif
    <table class="table">
        <thead>
            <tr>
                <th class="col">#ReservationId</th>
                <th class="col">Reservation Owner</th>
                <th class="col">Owner's email</th>
                <th class="col">owner's Phone</th>
                <th class="col">Number of Guests</th>
                <th class="col">Reservation Date</th>
                <th class="col">Reservation Time</th>
                <th class="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{$reservation->id}}</th>
                <td> {{$reservation->name}} </td>
                <td> {{$reservation->email}} </td>
                <td> {{$reservation->phone}} </td>
                <td> {{$reservation->guests}} </td>
                <td> {{$reservation->reservationdate}} </td>
                <td> {{$reservation->reservationtime}} </td>
                <td>
                    <div class="buttons-section">
                        <form method="POST" action="{{route('reservation.destroy',$reservation->id)}}"> 
                            @csrf
                            <a class="btn btn-success" href="{{route('reservation.edit',$reservation->id)}}">Edit</a>
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @method('DELETE')
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection