<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{


    //
    public function index()
    {
        $plants = Plant::all();
        return view('plants', compact('plants'));
    }

    public function show($id)
    {
        $plants = Plant::find($id);
        return view('details', compact('plants'));
    }
}
