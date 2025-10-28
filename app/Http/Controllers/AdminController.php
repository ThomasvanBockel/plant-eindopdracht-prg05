<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $plants = Plant::all();
        return view('/admin',
            compact('plants'));
    }

    public function toggle(Request $request, Plant $plant)
    {

        $plant->active = !$plant->active;
        $plant->save();
        return redirect()->route('plant.index');
    }
}
