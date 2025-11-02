<x-app-layout>
    @foreach ($plants as $plant)
        <div class="w-2/5 bg-gray-600 text-center m-5  border-2 border-green-500 rounded-lg mx-auto">

            <p class="text-white">plant name: {{$plant->name}}</p>
            <p class="text-white">plant description: {{$plant->description}}</p>
            <p class="text-white">the category is: {{$plant->category->name}}</p>


            <form action="{{route('plants.toggle', $plant)}}" method="POST">
                @csrf
                <input type="hidden" name="active" value="0">
                <label class="text-white" for="active">active: </label>
                <input
                    onchange="this.form.submit()"
                    type="checkbox"
                    name="active"
                    value="1"
                    id="active"
                    @if($plant->active == 1)
                        checked
                    @endif
                >

            </form>

        </div>
    @endforeach
</x-app-layout>


