<x-app-layout>
    @auth
        <x-slot name="header">

            <h2 class="text-white">Inglogd</h2>
        </x-slot>
    @endauth
    @guest
        <x-slot name="header">
            <h2 class="text-white">niet ingelogd</h2>
        </x-slot>
    @endguest
</x-app-layout>
