<?php

namespace App\Http\Controllers;

use App\City;
use App\Element;
use App\Street;
use App\Year;

class ElementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$years = Year::all();
    	$cities = City::all();
    	$streets = Street::all();
    	$elements = Element::all();

        return view('home', compact('years', 'cities', 'streets', 'elements'));
    }



}
