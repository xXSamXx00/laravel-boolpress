@extends('layouts.app')

@section('content')

<div class="container">
    <h2 class="text-center mb-4">Tutti i posts</h2>
    <div class="row g-5">
        <aside class="col-3">
            <div class="card mb-3">
                <div class="card-body">
                    <h3>Categorie</h3>
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('categories.posts', $category->slug) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3>Tags</h3>
                    <ul>
                        @foreach($tags as $tag)
                        <li>
                            <a href="{{ route('tags.posts', $tag->slug) }}">{{ $tag->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </aside>
        <div class="col-9">
            <div class="row">
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
    </div>
</div>

@endsection