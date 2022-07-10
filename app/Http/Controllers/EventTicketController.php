<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventTicketController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Event $event)
    {
        /**
         * Developer note: I know that this is only a rudimentary implementation.
         */

        // validations if necessary
        $request->validate([
            'quantity' => 'required|numeric|min:1|max:5',
        ]);

        for ($i=0; $i<request('quantity'); $i++) {
            Ticket::create([
                'user_id' => auth()->id(),
                'event_id' => $event->id,
                'price' => $event->price,
            ]);
        }

        return redirect()->route('tickets.index')->with('success','Ticket purchased successfully!');
    }
}
