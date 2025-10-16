<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Location;

class PlantController extends Controller
{


    //
    public function index()
    {
        $plants = Plant::all();
        return view('plants', compact('plants'));
    }

    public function show(Plant $plant)
    {
        return view('details', compact('plant'));

    }

    public function create()
    {

    }

    public function store()
    {

    }
}
