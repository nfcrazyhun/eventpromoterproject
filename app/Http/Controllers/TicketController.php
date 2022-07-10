<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tickets = Ticket::query()
            ->with('owner','event')
            ->where('user_id', auth()->id())
            ->paginate();

        return view('tickets.index', compact('tickets'));
    }
}
