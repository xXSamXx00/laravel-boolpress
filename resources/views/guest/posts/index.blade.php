@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="mb-4">Tutti i posts</h2>
    <div class="row g-5">
        @foreach($posts as $post)
        <div class="col-3">
            <a href="{{ route('posts.show', $post->slug) }}">
                <div class="content">
                    <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
                    <h3>{{ $post->title }}</h3>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection