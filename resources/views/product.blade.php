@extends('layouts.app-new')

@section('content')

@include('product-template',['product'=> $product])

@endsection