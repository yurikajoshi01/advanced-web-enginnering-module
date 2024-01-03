<x-app-layout>
    <div class="container">
        <div class="grid grid-cols-4">
            @foreach($randomProducts as $product)
                @include('product-template', ['product' => $product])
            @endforeach
        </div>
    </div>
</x-app-layout>
