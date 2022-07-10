<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($events->count())
                        <x-event.grid :events="$events" />

                        <!-- Pagination -->
                        {{ $events->links() }}
                    @else
                        <p class="text-center">No events yet. Please check back later.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
