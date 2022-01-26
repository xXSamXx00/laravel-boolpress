@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Tutti i prodotti</h2>
    <div class="row g-5">
        @foreach($products as $product)
        <div class="col-3">
            <a href="{{ route('products.show', $product->id) }}">
                <div class="content">
                    <img class="img-fluid" src="{{ $product->image }}" alt="{{ $product->name }}">
                    <h3>{{ $product->name }}</h3>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection