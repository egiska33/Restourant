<?php

namespace App\Http\Controllers;

use App\Mail\ReservationAccept;
use App\Reservation;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user =  auth()->user();
        if($user->role === 'admin')
        {
            $reservations = Reservation::orderBy('date', 'asc')->get();
            return view('reservations.index', compact('reservations'));

        }else{
            if(auth()->check()){
                $user = auth()->user();
            }
            return view('reservations.create', compact('user'));
             }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->check()){
            $user = auth()->user();
        }
        return view('reservations.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reservation::create($request->all());

        Mail::to($request->user())->send(new ReservationAccept($reservation));
        return redirect()->route('products.index')->with(['message' => 'Yours reservation accept']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
