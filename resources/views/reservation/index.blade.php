@extends('main')
@section('content')
<section class="reservation-index">
    <div class="head-image">
        <img src="{{URL::asset('/assets/food1.jpg')}}" alt="food" height="200" width="200">
        <img src="{{URL::asset('/assets/food2.jpg')}}" alt="food" height="200" width="200">
        <img src="{{URL::asset('/assets/vegetables.jpg')}}" alt="food" height="200" width="200">
    </div>
    <h3>All Made Reservations</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Reservation's Owner</th>
                <th scope="col">Email Adress</th>
                <th scope="col">Guests</th>
                <th scope="col">Reservation for</th>
                <th scope="col">Reservation Made</th>
                <th scope="col">Settings</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservations as $reservation)
            <tr>
                <td> {{ $reservation->name}} </td>
                <td> {{ $reservation->email}} </td>
                <td> {{ $reservation->guests}} </td>
                <td> {{ date('d/m/y',strtotime($reservation->reservationdate)) }} at {{ date('H:i',strtotime($reservation->reservationtime)) }} </td>
                <td>{{ $reservation->created_at->format('d-m-Y') }}</td>
                <td>
                    @can('update',$reservation)
                    <div class="buttons-section">
                        <form method="POST" action="{{route('reservation.destroy',$reservation->id)}}"> 
                            @csrf
                            <a class="btn btn-success" href="{{route('reservation.edit',$reservation->id)}}">Edit</a>
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @method('DELETE')
                        </form>
                    </div>    
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="reservations-navigation">
        <span>{{ $reservations->links() }}</span>
    </div>
</section>
@endsection