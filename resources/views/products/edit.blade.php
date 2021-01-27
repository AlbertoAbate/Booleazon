@extends('layouts.main')

@section('title-page')
    <title>Booleazon-Prodotti</title>
@endsection

@section('content')
    <h1>ciao</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                  <li class="alert alert-danger">
                    {{ $error }}
                  </li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="name">Nome Prodotto</label>
            <input class="form-control" type="text" name="name" value="{{ old('name', $product->name) }}">
        </div>
        <div class="form-group">
            <label for="productor">Produttore</label>
            <input class="form-control" type="text" name="productor" value="{{ old('productor', $product->productor) }}">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
            <textarea class="form-control" name="description">{{ old('name', $product->description) }}</textarea>        
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input class="form-control" type="text" name="price" value="{{ old('price', $product->price) }}">
        </div>
        <div class="form-group">
            <label for="image">Image:</label>
            @isset($product->image)
                <div class="wrap-image">
                    <img src="{{ $product->image }}" alt="{{ $product->name}}">
                </div>
                <h6>Change image: </h6>
            @endisset
            <input class="form-control" type="file" name="image" accept="image/*">
        </div>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Crea">
        </div>
    </form>
@endsection