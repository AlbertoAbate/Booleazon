@extends('layouts.main')

@section('title-page')
    <title>{{ $product->name }}</title>
@endsection

@section('content')
<div class="container text-white mb-5">
    <h1>ciao</h1>

    <h2>{{ $product->name }}</h2>
    <h4>{{ $product->productor }}</h4>
    <p>{{ $product->description }}</p>  
    <h3>{{ $product->price }} €</h3> 

    @if(!empty($product->image))
        <img width="300" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    @else
        <img width="300" src="{{ asset('img/placeholder.jpg') }}" alt="">
    @endif

    <a class="btn btn-success ml-5" href="{{ route('products.edit', $product->slug) }}">Edit</a>

    <form class="d-inline" action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        
        <input class="btn btn-danger my-4 ml-3" type="submit" value="Delete">
    </form>
</div>
    
@endsection