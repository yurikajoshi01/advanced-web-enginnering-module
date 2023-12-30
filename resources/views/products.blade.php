@extends('layouts.app-new')

@section('content')
  
    @foreach($products->chunk(4) as $chunk)
        <div class="grid grid-cols-4">
            @foreach($chunk as $product)
                @include('product-template', ['product' => $product])
            @endforeach
        </div>
    @endforeach
@endsection