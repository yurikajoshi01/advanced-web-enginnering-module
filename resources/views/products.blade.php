@extends('app')

@section('content')
<h2>Full List of Products</h2>
<table>
    <tr>
        <th>Artist</th>
        <th>Title</th>
        <th>Price</th>
    </tr>

    @foreach ($products as $product)
    <tr>
        <td> {{$product['artist']}} </td>
        <td> {{$product['title']}} </td>
        <td>{{$product['price']/100}}</td>
        <td> <button value="{{$product['id']}}" class="select-product">Select</button></td>
    </tr>
    @endforeach
</table>

@endsection