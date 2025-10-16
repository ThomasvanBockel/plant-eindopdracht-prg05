<x-app-layout>

    <x-slot name="header">
        <h2 class="text-white">Plant</h2>
    </x-slot>

    <x-slot>
        @foreach ($plants as $plant)
            <div class="p-10">
                <p class="text-white">{{ $plant->name }}</p>
                <p class="text-white">{{$plant->description}}</p>
                <a href="plant/{{$plant->id}}">
                    <x-secondary-button class="text-gray-600"> Back</x-secondary-button>
                </a>

            </div>
        @endforeach
    </x-slot>

</x-app-layout>
