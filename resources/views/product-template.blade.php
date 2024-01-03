<div class = "p-2 m-2 rounded-lg shadow-lg bg-gray-50 border-2 border-purple-400 max-md">
    <div class="flex justify-between">
        <h3 class="text-purple-700 mb-4 text-lg font-bold">{{$product['artist']}}</h3>
        <p class="bg-red-300 text-black text-sm py-2 px-2">{{$product->productType['type']}}</p>
    </div>
    <h2 class="font-bold mb-2 text-purple-600">{{$product['title']}}</h2>
    <p class ="text-grey-700">£{{number_format($product['price']/100, 2, '.', ',')}}</p>
    @if ($product->imagename=="no_image.png")
    <img src="{{asset('images/'.$product->imagename)}}" alt="product" class ="m-5" style=" height: 150px; ">
    @else
    <img src="{{asset('storage/images/'.$product->imagename)}}" alt="product" class ="m-5" style=" height: 150px; ">
    @endif
    <div class = "flex justify-between">
    <p></p>
        @if(Route::currentRouteName()=='index' || Route::currentRouteName()=='search')
            <button value = "{{$product['id']}}" class="bg-purple-300 hover:bg-purple-500 text-black font-bold py-2 px-4 rounded-full select-product">Select</button>
        @elseif(Route::currentRouteName()=='show')
        @can('purchase-product')
            <button value = "{{$product['id']}}" class="bg-purple-300 hover:bg-purple-500 text-black font-bold py-2 px-4 rounded-full">Buy</button>
        @endcan
        @can('edit-product')
            <button value = "{{$product['id']}}" class="bg-purple-300 hover:bg-purple-500 text-black font-bold py-2 px-4 rounded-full edit-product">Edit</button>            
        @endcan
        @endif    
    </div>
</div>