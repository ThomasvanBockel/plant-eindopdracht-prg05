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
    public function index(Request $request)
    {
        $query = Plant::query();


        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category);
            });
        }


        $plants = $query->get();

        return view('plants', compact('plants'));
    }

    public function show(Plant $plant)
    {

        return view('show',
            compact('plant'));

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

    public function admin()
    {
        $plants = Plant::all();
        return view('/admin',
            compact('plants'));

    }
    /*
        public function toggle(Request $request, Plant $plant)
        {
            $data = $request->validate([
                'active' => 'boolean',
            ]);

            $plant->update(['active' => $data['active']]);

            return back()->with('status', 'Plant status updated!');
        }

    */
}
