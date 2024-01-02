<div class = "p-2 m-2 rounded-lg shadow-lg bg-gray-50 border-2 border-purple-400 max-md">
    <div class="flex justify-between">
        <h3 class="text-purple-600 mb-4 text-lg font-bold">{{$product['artist']}}</h3>
        <p class="bg-purple-700 text-black text-sm py-2 px-2">{{$product->productType['type']}}</p>
    </div>
    <h3 class="font-bold mb-2 text-purple-400">{{$product['title']}}</h3>
    <img src="{{asset('images/no_image.png')}}" alt="product" class ="m-5 w-40 max-w-xs">
    <div class = "flex justify-between">
        <p class ="text-grey-700">£{{number_format($product['price']/100, 2, '.', ',')}}</p>
        @if(Route::currentRouteName()=='index' || Route::currentRouteName()=='search')
            <button value = "{{$product['id']}}" class="bg-purple-300 hover:bg-purple-500 text-2hite font-bold py-2 px-4 rounded-full select-product">Select</button>
        @elseif(Route::currentRouteName()=='show')
        @can('purchase-product')
            <button value = "{{$product['id']}}" class="bg-purple-300 hover:bg-purple-500 text-2hite font-bold py-2 px-4 rounded-full">Buy</button>
        @endcan
        @can('edit-product')
            <button value = "{{$product['id']}}" class="bg-purple-300 hover:bg-purple-500 text-2hite font-bold py-2 px-4 rounded-full edit-product">Edit</button>            
        @endcan
        @endif    
    </div>
</div>