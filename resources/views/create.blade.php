<x-app-layout>
    <form action="{{ route('plant.store') }}" method="post">
        @csrf
        <div>
            <label class="text-white" for="name">Name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}">
            @error('name')
            <div class="alert alert-danger text-red-600">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label class="text-white" for="description">description</label>
            <input type="text" id="description" name="description" value="{{old('description')}}">
            @error('description')
            <div class="alert alert-danger text-red-600">{{$message}}</div>
            @enderror
        </div>

        <div>
            <label class="text-white" for="category_id">Category</label>
            <select name="category_id" id="">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"> {{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <a href="{{route('plant.index')}}">
                <x-secondary-button class="text-gray-600"> Back</x-secondary-button>
            </a>
            <x-primary-button class="text-white" type="submit" name="submit" value="Create">
                Create
            </x-primary-button>
        </div>
    </form>
</x-app-layout>
