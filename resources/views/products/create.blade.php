@extends('layouts.main')

@section('title-page')
    <title>Booleazon-Prodotti</title>
@endsection

@section('content')
<div class="container">
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


    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Nome Prodotto</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="productor">Produttore</label>
            <input class="form-control" type="text" name="productor" value="{{ old('productor') }}">
        </div>
        <div class="form-group">
            <label for="description">Descrizione</label>
             <textarea class="form-control" name="description">{{ old('description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Prezzo</label>
            <input class="form-control" type="text" name="price" value="{{ old('price') }}">
        </div>
        <div class="form-group">
            <label for="image">Image: </label>
            <input class="form-control" type="file" accept="image/*" name="image" value="{{ old('image') }}">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Crea">
        </div>
    </form>
</div>
    
@endsection