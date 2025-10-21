<x-app-layout>

    <x-slot name="header">
        <h2 class="text-white">Plant</h2>
        <a href="{{route('plant.create')}}">
            <x-secondary-button class=" dark:bg-green-900 dark:hover:bg-green-700"> Create</x-secondary-button>
        </a>
    </x-slot>

    <x-slot>

        @foreach ($plants as $plant)
            @if($plant->active === 1)
                <div class="p-10">
                    <p class="text-white">{{ $plant->name }}</p>
                    <p class="text-white">{{$plant->description}}</p>
                    <a href="plant/{{$plant->id}}">
                        <x-secondary-button class="text-gray-600"> Details</x-secondary-button>
                    </a>

                </div>
            @endif
        @endforeach
    </x-slot>

</x-app-layout>
