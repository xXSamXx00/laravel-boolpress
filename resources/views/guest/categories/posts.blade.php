@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Tutti i posts con la categoria {{ $category->name }}</h2>
    <div class="row g-5">
        @forelse($posts as $post)
        <div class="col-3">
            <a href="{{ route('posts.show', $post->slug) }}">
                <div class="content">
                    <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
                    <h3>{{ $post->title }}</h3>
                </div>
            </a>
        </div>
        @empty
        <div class="col">
            <p>Nessun Post con questa categoria</p>
        </div>
        @endforelse
    </div>
</div>

@endsection