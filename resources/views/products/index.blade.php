@extends('layouts.main')

@section('title-page')
    <title>Booleazon-Prodotti</title>
@endsection

@section('content')
    <div class="container">
        <h1>ciao</h1>

    @if(session('deleted')) 
        <p><span class="font-weight-bold">{{ session('deleted') }}</span> has been cancelled correctly.</p>
    @endif


    <ul>
        @foreach ($products as $product)
        <li>
            <h2>{{ $product->name }}</h2>
            <h4>{{ $product->productor }}</h4>  
            <h3>{{ $product->price }}€</h3> 
            @if(!empty($product->image))
                <img width="200" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <img width="200" src="{{ asset('img/placeholder.jpg') }}" alt="">
            @endif
        </li>

        <a href="{{ route('products.show', $product->slug) }}" class="btn btn-primary">
           Show  
        </a>
        @endforeach

    </ul>

    {{ $products->links() }}
    </div>
    
@endsection