@extends('layouts.main')

@section('title-page')
    <title>Booleazon-Prodotti</title>
@endsection

@section('content')
    <h1>ciao</h1>

    <h2>{{ $product->name }}</h2>
    <h4>{{ $product->productor }}</h4>
    <p>{{ $product->description }}</p>  
    <h3>{{ $product->price }}</h3> 
    <img src="{{ $product->image }}" alt="{{ $product->name }}">
    <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
@endsection