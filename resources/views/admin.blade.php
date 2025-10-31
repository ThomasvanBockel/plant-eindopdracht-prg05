<x-app-layout>
    @foreach ($plants as $plant)
        <div class="p-10">
            <p class="text-white">{{$plant->name}}</p>
            <p class="text-white">{{$plant->description}}</p>
            <p class="text-white">the category is: {{$plant->category->name}}</p>


            <form action="{{route('plants.toggle', $plant)}}" method="POST">
                @csrf
                <label class="text-white" for="active">Active</label>


                <input type="hidden" name="active" value="0">

                <label class="text-white" for="active">active</label>
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


