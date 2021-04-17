<?php

namespace Wefly\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }
    public function vols()
    {
        $vols=DB::table('vols')->get();
//        dd($vols);
        return $vols;
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
