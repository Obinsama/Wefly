<?php

namespace Wefly\Http\Controllers;

use Wefly\Vol;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\DB;
class VolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $vols= Vol::orderByDesc('id')->take(5)->get();
//        $vols=DB::table('vols')->get();

        return json_encode($vols);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \Wefly\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function show(Vol $vol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Wefly\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function edit(Vol $vol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Wefly\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vol $vol)
    {
//        statut values 'closed', 'pending'
        $vol->statut='closed';
        $vol->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Wefly\Vol  $vol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vol $vol)
    {
        //
    }
}
