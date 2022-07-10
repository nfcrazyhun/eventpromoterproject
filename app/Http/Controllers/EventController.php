<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $events = Event::query()
            ->with(['location','performers'])
            ->where('starts_at','>=', now()->startOfDay())
            ->orderBy('starts_at')
            ->paginate();

        return view('events.index', compact('events'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
}
