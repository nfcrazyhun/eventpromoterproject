<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $locations = Location::paginate();

        return view('locations.index', compact('locations'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Location  $location
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Location $location)
    {
        return view('locations.show', compact('location'));
    }
}
