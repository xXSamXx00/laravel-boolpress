@extends('layouts.app')

@section('content')

<h2 class="text-center mb-4">{{ $product->name }}</h2>
<div class="show mx-auto">
    <div class="col-3">
        <div class="card p-3">
            <img class="img-fluid" src="{{ $product['image'] }}" alt="{{ $product->name }}">
            <p class="mt-3">{{ $product->price }}€</p>
            <p>{{ $product->description }}</p>
        </div>
    </div>
</div>

@endsection