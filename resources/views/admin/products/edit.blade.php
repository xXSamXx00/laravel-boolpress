@extends('layouts.admin')

@section('content')

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Elementi</h1>
    </div>

    <h2>Aggiorna Prodotto</h2>
    <div class="create">
        @include('partials.error')
        <form action="{{ route('admin.products.update', $product->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome Prodotto</label>
                <input type="text" class="form-control" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelper" placeholder="Inserisci il nome" value="{{ $product->name }}">
                <small id="nameHelper" class="form-text text-muted">Scrivi il nome del prodotto, max 255 caratteri</small>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="text" class="form-control" name="image" id="image" class="form-control @error('image') is-invalid @enderror" aria-describedby="imageHelper" placeholder="Inserisci il link" value="{{ $product->image }}">
                <small id="imageHelper" class="form-text text-muted">Scrivi il link completo dell' immagine, max 255 caratteri</small>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" name="price" id="price" class="form-control @error('price') is-invalid @enderror" aria-describedby="priceHelper" placeholder="Inserisci il prezzo" value="{{ $product->price }}" step="0.01">
                <small id="priceHelper" class="form-text text-muted">Inserisci il prezzo del prodotto</small>
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea placeholder="Inserisci la descrizione" class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5">{{ $product->description }}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center pb-5">
                <button type="submit" class="btn btn-success w-25">Salva</button>
            </div>
        </form>
    </div>
</div>

@endsection