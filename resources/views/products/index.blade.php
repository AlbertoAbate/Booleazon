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


    <ul class="d-flex flex-wrap justify-content-around pt-5">
        @foreach ($products as $product)
        <li class="card mb-2 mt-2" style="width: 18rem;">
            @if(!empty($product->image))
                <img class="card-img-top"
                width="200" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
            @else
                <img class="card-img-top"
                width="200" src="{{ asset('img/placeholder.jpg') }}" alt="">
            @endif        
            <div class="card-body">            
                <h2 class="card-title">{{ $product->name }}</h2>
                <h4 class="card-text">{{ $product->productor }}</h4>  
                <h3 class="card-text">{{ $product->price }}€</h3> 
            </div>
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-success">
                Show  
            </a>
        </li>

        
        @endforeach

    </ul>

    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
    </div>
    
@endsection