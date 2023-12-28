@if(Route::currentRouteName()=='index')
<div class="p-2 bg-purple-200">
@else 
<div class="p-8 max-w-xl bg-purple-200">
@endif
    <div class ="bg-white p-1 rounded-lg shadow-lg">
        <h3 class="text-purple-600 mb-4 text-lg font-bold">{{$product['artist']}}</h3>
        <h3 class ="font-bold mb-2 text-gray-800">{{$product['title']}}</h3>
        <div class="flex justify-between">
            <p class="text-gray-700">£{{$product['price']/100}}</p>
            @if(Route::currentRouteName()=='index')
                <button value="{{$product['id']}}" class="bg-purple-400 hover:bg-purple-600 text-white font-bold py-2 px-4 rounded-full select-product">Select</button>
            @endif
        </div>
    </div>
</div>