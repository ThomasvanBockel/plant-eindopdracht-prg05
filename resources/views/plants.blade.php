<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-row">
            <div class="pr-16">
                <x-dropdown align="left" width="10%">
                    <x-slot name="trigger">
                        <x-secondary-button>
                            Filter
                        </x-secondary-button>
                    </x-slot>
                    <div>
                        <x-slot name="content">
                            <div @click.stop>
                                <form method="GET" action="">
                                    <input type="text" name="search" id="search" placeholder="Voer de naam in">
                                    <x-secondary-button type="submit">Zoeken</x-secondary-button>
                            </div>

                            <x-secondary-button type="submit" name="category" value="{{ request('search') }}">
                                Alle planten
                            </x-secondary-button>

                            @foreach ($categories as $category)
                                <x-secondary-button type="submit" name="category" value="{{$category->name}}">
                                    {{$category->name}}
                                </x-secondary-button>
                              
                            @endforeach

                        </x-slot>
                    </div>
                </x-dropdown>
            </div>
            <div class="pr-16">
                <a href="{{route('plant.create')}}">
                    <x-secondary-button class=" dark:bg-green-900 dark:hover:bg-green-700"> Create</x-secondary-button>
                </a>
            </div>
            <div>
                @if($validation > 3)
                    <a href="{{route('myPlants')}}">
                        <x-secondary-button class=" dark:bg-green-900 dark:hover:bg-green-700"> mijn planten
                        </x-secondary-button>
                    </a>
                @endif
            </div>
        </div>
    </x-slot>


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
