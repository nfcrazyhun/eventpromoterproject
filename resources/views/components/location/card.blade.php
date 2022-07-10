@props(['location'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div>
            <img src="https://picsum.photos/550/360" alt="Performer illustration" class="rounded-xl">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="{{ route('locations.show', ['location' => $location]) }}">
                            {{ $location->name }}
                        </a>
                    </h1>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {{ Str::limit($location->description, 160) }}
            </div>

            <footer class="mt-6 space-y-2">
                <div class="flex justify-end">
                    <a href="{{ route('locations.show', ['location' => $location]) }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
