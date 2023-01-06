<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Formation;
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
        $nbr = Formation::get(); 
        // $nbr = DB::table('etudiants')->withCount('formation')->get();
        // dd(count($nbr[0]->etudiants));
        return view('frontend.home.home',compact('nbr'));
    }
}
