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
                    <main class="mx-auto lg:my-10 space-y-6">
                        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                                <img src="https://picsum.photos/550/360" alt="Event illustration" class="rounded-xl">

                                <p class="mt-4 block text-gray-400 text-xs">
                                    Starting at:
                                    <time>{{ $event->starts_at }}</time>
                                    <time>({{ $event->starts_at->diffForHumans() }})</time>
                                </p>

                                <div class="flex flex-col lg:items-center lg:justify-center text-norman mt-2">
                                    <form method="POST" action="{{ route('events.ticket.store', $event) }}" enctype="multipart/form-data">
                                        @csrf

                                        <select name="quantity" id="quantity">
                                            @foreach(range(1,5) as $index)
                                                <option value="{{ $index }}">{{ $index }}</option>
                                            @endforeach
                                        </select>

                                        <button type="submit" class="font-bold text-2xl transition-colors hover:text-blue-500">
                                            Buy a ticket!
                                        </button>
                                    </form>

                                    @if ($errors->any())
                                        <div class="text-red-800 text-sm mb-6">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <div class="">
                                    <div class="font-bold text-blue-500">
                                        Price: {{ $event->price }} Ft
                                    </div>
                                </div>

                                <div class="flex items-center lg:justify-center text-normal mt-2">
                                    <div class="font-bold transition-colors hover:text-blue-500">
                                        Location:
                                        <a href="{{ route('locations.show', ['location' => $event->location]) }}">{{ $event->location->name }}</a>
                                    </div>
                                </div>

                                <div class="flex items-center lg:justify-center text-normal mt-2">
                                    <div class="font-bold">
                                        Performers:
                                        <ul class="font-normal">
                                            @foreach($event->performers as $performer)
                                                <li class="transition-colors hover:text-blue-500">
                                                    <a href="{{ route('performers.show', ['performer' => $performer]) }}">{{ $performer->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-8">
                                <div class="hidden lg:flex justify-between mb-6">
                                    <a href="{{ route('events.index') }}"
                                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                            <g fill="none" fill-rule="evenodd">
                                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5"
                                                      d="M21 1v20.16H.84V1z">
                                                </path>
                                                <path class="fill-current"
                                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                                </path>
                                            </g>
                                        </svg>

                                        Back to Events
                                    </a>
                                </div>

                                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                                    {{ $event->name }}
                                </h1>

                                <div class="space-y-4 lg:text-lg leading-loose prose ">
                                    {{ $event->description }}
                                </div>
                            </div>
                        </article>
                    </main>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
