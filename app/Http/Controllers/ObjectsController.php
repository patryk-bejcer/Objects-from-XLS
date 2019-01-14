<?php

namespace App\Http\Controllers;

use App\City;
use App\Object;
use App\Street;
use App\Year;
use Illuminate\Http\Request;

class ObjectsController extends Controller
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
    	$objects = Object::all();

        return view('home', compact('years', 'cities', 'streets', 'objects'));
    }



}
