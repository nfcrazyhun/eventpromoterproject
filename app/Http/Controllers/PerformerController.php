<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Performer;
use Illuminate\Http\Request;

class PerformerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $performers = Performer::paginate();

        return view('performers.index', compact('performers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Performer  $performer
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Performer $performer)
    {
        return view('performers.show', compact('performer'));
    }
}
