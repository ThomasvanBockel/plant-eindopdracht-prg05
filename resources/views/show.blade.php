<x-app-layout>

    <x-slot>

        <div class="p-10">
            <p class="text-white">{{$plant->name}}</p>
            <p class="text-white">{{$plant->description}}</p>
            <p class="text-white">the category is: {{$plant->category->name}}</p>
            <a href="{{route('plant.index')}}">
                <x-secondary-button class="text-gray-600"> Back</x-secondary-button>
            </a>

            <form action="{{route('plant.destroy', $plant->id)}}" method="post">
                @csrf
                @method('DELETE')
                <x-secondary-button type="submit"
                                    class="text-red-700"> delete
                </x-secondary-button>
            </form>
            <form action="{{route('plant.edit', $plant->id)}}" method="get">
                @csrf
                <x-secondary-button type="submit"
                                    class="text-blue-800"> Edit
                </x-secondary-button>
            </form>
        </div>

    </x-slot>

</x-app-layout>
