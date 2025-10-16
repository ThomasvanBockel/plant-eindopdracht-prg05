<x-app-layout>

    <x-slot>

        <div class="p-10">
            <p class="text-white">{{$plant->name}}</p>
            <p class="text-white">{{$plant->description}}</p>
            <p class="text-white">the category is: {{$categories->name}}</p>
            <a href="{{route('plant.index')}}">
                <x-secondary-button class="text-gray-600"> Back</x-secondary-button>
            </a>
        </div>

    </x-slot>

</x-app-layout>
