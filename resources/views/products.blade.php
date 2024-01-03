<x-app-layout>
    <div class="container">
        @foreach($products->chunk(4) as $chunk)
            <div class="grid grid-cols-4">
                @foreach($chunk as $product)
                    @include('product-template', ['product' => $product])
                @endforeach
            </div>
        @endforeach

       
    </div>
</x-app-layout>