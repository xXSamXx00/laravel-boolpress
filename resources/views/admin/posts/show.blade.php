@extends('layouts.admin')

@section('content')

<h2 class="text-center my-4">{{ $post->title }}</h2>
<div class="show mx-auto">
    <div class="col-3">
        <div class="card p-3">
            <img class="img-fluid" src="{{ $post->image }}" alt="{{ $post->title }}">
            <p class="mt-4">{{ $post->body }}</p>
        </div>
    </div>
</div>

@endsection