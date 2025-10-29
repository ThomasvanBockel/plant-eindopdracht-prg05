<x-app-layout>
    <div class="flex  flex-col items-center ">
        @if($plants)
            @foreach ($plants as $plant)
                @if($plant->active == 1)
                    <div class="min-w-96 bg-gray-600 text-center m-5 border-2 border-green-500 rounded-lg mx-auto">
                        <p class="text-white">Plant naam: {{ $plant->name }}</p>
                        <p class="text-white">plant beschrijving: {{$plant->description}}</p>
                        <a href="plant/{{$plant->id}}">
                            <x-secondary-button class="text-gray-600"> Details</x-secondary-button>
                        </a>

                    </div>
                @endif
            @endforeach
        @endif
    </div>

</x-app-layout>
