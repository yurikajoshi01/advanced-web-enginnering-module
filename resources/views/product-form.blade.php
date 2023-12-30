@extends('layouts.app')

@section('content')
<div class="max-w-xs mx-auto mt-8">
    <form action="/products" method="post" class="bg-white p-4 rounded-md shadow-md">
        @csrf
        <div class="mb-3">
        <h3 class="text-purple-700 mb-4 text-lg font-bold">Add New Product:</h3>
            <label for="producttype" class="block text-sm font-medium text-gray-600">Product Type:</label>
            <select id="producttype" name="producttype" class="mt-1 p-2 border rounded-md w-full">
                <option disabled selected value>Select one Option</option>
                <option value="1">Book</option>
                <option value="2">CD</option>
                <option value="3">Game</option>
            </select>
            @error('producttype')
            <p class = "text-red-500 font-medium">{{$errors->first('producttype')}}</p>
            @enderror            
        </div>

        <div class="mb-3">
            <label for="artist" class="block text-sm font-medium text-gray-600">Artist:</label>
            <input type="text" id="artist" name="artist" class="mt-1 p-2 border rounded-md w-full">
            @error('artist')
            <p class = "text-red-500 font-medium ">{{$errors->first('artist')}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="block text-sm font-medium text-gray-600">Title:</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 border rounded-md w-full">
            @error('title')
            <p class = "text-red-500 font-medium ">{{$errors->first('title')}}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="block text-sm font-medium text-gray-600">Price:</label>
            <input type="text" id="price" name="price" class="mt-1 p-2 border rounded-md w-full">
            @error('price')
            <p class = "text-red-500 font-medium ">{{$errors->first('price')}}</p>
            @enderror
        </div>

        <button type="submit" class="bg-purple-400 text-black p-2 rounded-md hover:bg-purple-700 w-full">Submit</button>
    </form>
</div>
@endsection
