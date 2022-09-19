<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
  
    /**
     * Show the form for creating a new resource.//reservation
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the incoming data from the create reservation form
        $validated = $request->validate([
            'name' => 'required|alpha',
            'email' => 'email',
            'phone' => 'numeric',
            'guests' => 'integer',
            'reservationdate' => 'date|after:tomorrow',
            'reservationtime'=> 'date_format:H:i',
        ]);
        //instantiate a new reservation model instance
        $reservation = new Reservation;
        //populate the new instance attributes
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guests=$request->guests;
        $reservation->reservationdate= date('Y-m-d',$request->restervationdate);
        $reservation->reservationtime= $request->reservationtime;
        //save the new creataed instance to database table
        $reservation->save();
        //redirect the user with a success message
        $request->session()->flash('success','reservation made succesefully !');
        return redirect()->route('reservation.show',$reservation->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //retreive the reservation model corresponding to the id passed to the route
        $reservation = Reservation::find($id);
        //redirect to the view that displays the ressource 
        return view('reservation.show')->with('reservation',$reservation);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //retreive the ressource to edit 
        $reservation = Reservation::find($id);
        //return the view that displays the reservation to edit
        return view('reservation.edit')->with('reservation',$reservation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the request input data 
        $validated = $request->validate([
            'name' => 'required|alpha',
            'email' => 'email',
            'phone' => 'numeric',
            'guests' => 'integer',
            'reservationdate' => 'date|after:tomorrow',
            'reservationtime'=> 'date_format:H:i:s',
        ]);
        //retreive the reservation corresponding to the id passed to the function
        $reservation = Reservation::find($id);
        //chnage the ressource attributes
        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guests = $request->guests;
        $reservation->reservationdate = $request->reservationdate;
        $reservation->reservationtime = $request->reservationtime;
        //save the updated ressource to databsase
        $reservation->save();
        //flash a success message to session
        $request->session()->flash('success','Reservation updated succesefully');
        //redirect to the show reservation page
        return redirect()->route('reservation.show',$reservation->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //Retreive the reservation ressource corresponding to the id
        $reservation = Reservation::find($id);
        $reservation->delete();
        //redirect with a flash message to session
        $request->session()->flash('deleted','Reservation Canceled succesefully !');
        return redirect()->route('home');
    }
}
