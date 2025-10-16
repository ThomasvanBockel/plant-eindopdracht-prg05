<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Location;

class PlantController extends Controller
{


    //
    public function index()
    {
        $plants = Plant::all();
        return view('plants',
            compact('plants'));
    }

    public function show(Plant $plant)
    {
        $categories = Category::find($plant->category_id);
        return view('show',
            compact('plant'),
            compact('categories'));

    }

    public function create()
    {
        $categories = Category::all();
        return view('create',
            compact('categories'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required'
        ]);

        $plant = new Plant();
        $plant->name = $request->input('name');
        $plant->description = $request->input('description');
        $plant->user_id = Auth::id();
        $plant->category_id = $request->input('category_id');

        $plant->save();

        return redirect()->route('plant.index');
    }
}
