@extends('layouts.admin')

@section('content')

<h2 class="text-center mb-4">{{ $post->title }}</h2>
<div class="show mx-auto">
    <div class="col-3">
        <div class="card p-3">
            <p>
                @if($post->category)
                Categorie: <a href="{{ route('categories.posts', $post->category->slug) }}">{{ $post->category->name }}</a>
                @else
                <span>Nessuna Categoria</span>
                @endif
            </p>
            <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
            <p>{{ $post->body }}</p>
        </div>
    </div>
</div>

@endsection