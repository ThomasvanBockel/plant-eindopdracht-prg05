<x-app-layout>

    <x-slot name="header">
        <h2 class="text-white">Plant</h2>
    </x-slot>

    <x-slot>
        @foreach ($plants as $plant)
            <div class="p-10">
                <p class="text-white">{{ $plant->name }}</p>
                <p class="text-white">{{$plant->description}}</p>
                <a href="/details/{{$plant->id}}"
                   class="text-gray-400 hover:text-red-500 transition duration-1000 ease-in-out">about</a>

            </div>
        @endforeach
    </x-slot>

</x-app-layout>
