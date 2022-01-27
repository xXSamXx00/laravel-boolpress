@extends('layouts.app')

@section('content')

<h2 class="text-center mb-4">{{ $post->title }}</h2>
<div class="show mx-auto">
    <div class="col-3">
        <div class="card p-3">
            <p>Categoria: {{ $post->category != null ? $post->category->name : 'Nessuna Categoria' }}</p>
            <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
            <p>{{ $post->body }}</p>
        </div>
    </div>
</div>

@endsection