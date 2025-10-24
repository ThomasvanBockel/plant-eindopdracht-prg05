<x-app-layout>
    @foreach ($plants as $plant)
        <div class="p-10">
            <p class="text-white">{{$plant->name}}</p>
            <p class="text-white">{{$plant->description}}</p>
            <p class="text-white">the category is: {{$plant->category->name}}</p>

            {{--            <form action="{{ route('plants.toggle',  $plant->id) }}" method="POST">--}}
            {{--                @csrf--}}
            {{--                @method('PUT')--}}
            {{--            <input type="hidden" name="active" value="0">--}}
            <input
                type="checkbox"
                name="active"
                id="active"
                {{--                value="1"--}}
                {{--                {{ $plant->active ? 'checked' : '' }}--}}
                {{--                onchange="this.form.submit()"--}}
            />
            {{--               </form>--}}
        </div>
    @endforeach
</x-app-layout>


