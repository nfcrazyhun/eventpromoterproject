<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-4">

                    @if ($tickets->count())
                        @foreach($tickets as $ticket)
                        <ul class="list-disc">
                            <li>id: {{ $ticket->id }}</li>
                            <li>Owner: {{ $ticket->owner->name }}</li>
                            <li>
                                Event:
                                <a href="{{ route('events.show', $ticket->event->id) }}"
                                   class="underline hover:text-blue-500">
                                    {{ $ticket->event->name }}
                                </a>
                            </li>
                            <li>Price: {{ $ticket->price }} Ft</li>
                        </ul>
                        <hr>
                        @endforeach

                        <!-- Pagination -->
                        {{ $tickets->links() }}
                    @else
                        <p class="text-center">No Ticket history yet. Please buy some ticket first.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
