<x-app-layout>

    <x-slot>

        <div class="p-10">
            <p class="text-white">{{$plant->name ?? ""}}</p>
            <p class="text-white">{{$plant->description ?? ""}}</p>

            <a class="text-gray-600" href="/plants">Back</a>

        </div>

    </x-slot>

</x-app-layout>
