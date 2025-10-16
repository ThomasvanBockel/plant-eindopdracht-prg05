<?php

namespace App\Http\Controllers;

use App\Models\Plants;
use Illuminate\Http\Request;

class PlantController extends Controller
{


    //
    public function index()
    {
        $plants = Plants::all();
        return view('plants', compact('plants'));
    }

    public function show($id)
    {
        $plants = Plants::find($id);
        return view('details', compact('plants'));
    }
}
