@props(['event'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="https://picsum.photos/550/360" alt="Event illustration" class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{ route('events.show', ['event' => $event]) }}">
                            {{ $event->name }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Starting at: <time>{{ $event->starts_at }}</time> <time>({{ $event->starts_at->diffForHumans() }})</time>
                    </span>
                </div>
            </header>

            <div class="text-sm my-4 space-y-4">
                {{ Str::limit($event->description, 160) }}
            </div>

            <div class="space-y-4">
                <div class="">
                    <div class="font-bold text-blue-500">
                        Price: {{ $event->price }} Ft
                    </div>
                </div>

                <div class="font-bold transition-colors hover:text-blue-500">
                    Location:
                    <a href="{{ route('locations.show', ['location' => $event->location]) }}">{{ $event->location->name }}</a>
                </div>

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

            <footer class="mt-6 space-y-2">
                <div class="flex justify-end">
                    <a href="{{ route('events.show', ['event' => $event]) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
