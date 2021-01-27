@extends('layouts.main')

@section('title-page')
    <title>Booleazon-Prodotti</title>
@endsection

@section('content')
    <h1>ciao</h1>

    <ul>
        @foreach ($products as $product)
        <li>
            <h2>{{ $product->name }}</h2>
            <h4>{{ $product->productor }}</h4>  
            <h3>{{ $product->price }}</h3> 
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        </li>
        <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">
           Show  
        </a>
        @endforeach

    </ul>
@endsection