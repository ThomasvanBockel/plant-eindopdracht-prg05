<x-app-layout>

    <x-slot name="header">
        <h2 class="text-white">Plant</h2>
        <a href="{{route('plant.create')}}">
            <x-secondary-button class=" dark:bg-green-900 dark:hover:bg-green-700"> Create</x-secondary-button>
        </a>
    </x-slot>


    <x-dropdown align="left" width="100">
        <x-slot name="trigger">
            <x-secondary-button>
                Categories
            </x-secondary-button>
        </x-slot>
        <div>
            <x-slot name="content">
                <div @click.stop>
                    <form method="GET" action="">

                        <input type="text" name="search" id="search" placeholder="Voer de naam in">
                        <x-secondary-button type="submit">Zoeken</x-secondary-button>
                    </form>
                </div>
                <form method="GET" action="">
                    <x-secondary-button type="submit" name="category" value="">
                        Alle planten
                    </x-secondary-button>
                </form>
                @foreach ($categories as $category)
                    <form method="GET" action="">
                        <x-secondary-button type="submit" name="category" value="{{$category->name}}">
                            {{$category->name}}
                        </x-secondary-button>
                    </form>
                @endforeach

            </x-slot>
        </div>
    </x-dropdown>
    <div class="flex  flex-col items-center ">
        @if($plants)
            @foreach ($plants as $plant)

                <div class="min-w-96 bg-gray-600 text-center m-5 border-2 border-green-500 rounded-lg mx-auto">
                    <p class="text-white">Plant naam: {{ $plant->name }}</p>
                    <p class="text-white">plant beschrijving: {{$plant->description}}</p>
                    <a href="plant/{{$plant->id}}">
                        <x-secondary-button class="text-gray-600"> Details</x-secondary-button>
                    </a>

                </div>

            @endforeach
        @endif
    </div>

</x-app-layout>
