<?php

namespace Wefly\Http\Controllers;

use Wefly\Reservation;
use Illuminate\Http\Request;
use Wefly\Vol;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reservation::orderByDesc('id')->take(5)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vol=new Vol;

        $vol->aeroport_dep=$request->depart;
        $vol->aeroport_arr=$request->destination;
        $vol->date_dep=$request->date_resa;
        $vol->heure_dep=$request->heure_resa;
        $vol->date_arr=$request->date_resa;
        $vol->heure_arr=$request->heure_resa;
        $flights=Vol::all();
        $vol_id="";
        foreach ($flights as $flight){
            if($vol->aeroport_dep==$flight->aeroport_dep && $vol->aeroport_arr==$flight->aeroport_arr && $flight->statut!='closed' ){
                    $vol_id=$flight->id;
                    break;
            }
        }
        if($vol_id==''){
            $vol->save();
            $vol_id=Vol::orderByDesc('id')->first()->id;
        }
        $resa=new Reservation;

        $numero=strtoupper(Date('M')).time();
//        $resa->client_id=Auth::id();
        $resa->client_id=1;
        $resa->vol_id=$vol_id;
        $resa->numero=$numero;
        $resa->nom_prenom=$request->passager;
        $resa->date=$request->date_resa;
        $resa->heure=$request->heure_resa;
        $resa->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \Wefly\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wefly\Reservation  $reservation
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
     * @param  \Wefly\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        $reservation->statut='confirme';
        $reservation->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wefly\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {

        $reservation->statut='annule';
        $reservation->save();
    }
}
