<x-app-layout>
    <div class="w-2/5 bg-gray-600 text-center m-5  border-2 border-green-500 rounded-lg mx-auto">
        <form action="{{ route('plant.store') }}" method="post">
            @csrf
            <div class="mb-5 pl-9">
                <label class="text-white" for="name">Name</label>
                <input type="text" id="name" name="name" value="{{old('name')}}">
                @error('name')
                <div class="alert alert-danger text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-5 ">
                <label class="text-white" for="description">description</label>
                <input type="text" id="description" name="description" value="{{old('description')}}">
                @error('description')
                <div class="alert alert-danger text-red-600">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-5 pl-2">
                <label class="text-white" for="category">Category</label>
                <select name="category" id="">
                    <option value="" selected disabled>Geen geselecteerd</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"> {{$category->name}}</option>
                    @endforeach
                </select>
                @error('category')
                <div class="alert alert-danger text-red-600">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-5 pl-20">
                <a href="{{route('plant.index')}}">
                    <x-secondary-button class="text-gray-600"> Back</x-secondary-button>
                </a>
                <x-primary-button class="text-white" type="submit" name="submit" value="Create">
                    Create
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
