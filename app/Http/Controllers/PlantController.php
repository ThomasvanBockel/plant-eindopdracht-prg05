<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use mysql_xdevapi\Result;
use phpDocumentor\Reflection\Location;


class PlantController extends Controller
{
    public function myPlants()
    {
        $validation = Plant::with('user')
            ->where('user_id', Auth::id())
            ->where('active', 1)
            ->count();


        if ($validation > 3) {
            $query = Plant::with('user')->where('user_id', Auth::id());
            $plants = $query->get();


            return view('myPlants',
                compact('plants'));
        } else {
            return redirect()->route('plant.index');
        }

    }

    public function welcome()
    {
        $plants = Plant::where('active', 1)
            ->get();

        return view('welcome', compact('plants'));
    }

    //
    public function index(Request $request)
    {
        $query = Plant::where('active', 1);
        $categories = Category::all();

        $validation = Plant::with('user')
            ->where('user_id', Auth::id())
            ->where('active', 1)
            ->count();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('name', $request->category)
                    ->where('active', 1);
            });
        }
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->where('active', 1);
        }

        $plants = $query->get();

        return view('plants', compact('plants', 'categories', 'validation'));
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

    public function edit(string $id)
    {
        $categories = Category::all();
        $plant = Plant::find($id);

        if (Auth::user()->cannot('edit-check', $plant)) {
            return redirect()->route('plant.index');
        }

        return view('edit',
            compact('categories', 'plant'));

    }

    public function destroy(Plant $plant)
    {
        if (Auth::user()->cannot('delete-check', $plant)) {
            return redirect()->route('plant.index');
        }

        $plant->delete();

        return redirect()
            ->route('plant.index');

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required',
            'category' => 'required'
        ]);

        $plant = new Plant();
        $plant->name = $request->input('name');
        $plant->description = $request->input('description');
        $plant->user_id = Auth::id();
        $plant->category_id = $request->input('category');
        $plant->save();

        return redirect()->route('plant.index');
    }

    public function update(Request $request, Plant $plant)
    {
        $request->validate([
            'name' => 'required|max:100',
            'description' => 'required'
        ]);

        $plant->name = $request->input('name');
        $plant->description = $request->input('description');
        $plant->user_id = Auth::id();
        $plant->category_id = $request->input('category_id');
        $plant->active = false;
        $plant->save();

        return redirect()->route('plant.index');
    }

}
