@extends('layouts.admin')

@section('content')

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Elementi</h1>
    </div>
    <div class="container d-flex flex-wrap justify-content-between">
        <div class="card col-3 mb-5">
            <div class="card-body text-center">
                <h3>Prodotti</h3>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary mt-3">Crea Prodotto</a>
            </div>
        </div>
        <div class="card col-3 mx-4 mb-5">
            <div class="card-body text-center">
                <h3>Posts</h3>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mt-3">Crea Post</a>
            </div>
        </div>
        <div class="card col-3 mb-5">
            <div class="card-body text-center">
                <h3>Categorie</h3>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mt-3">Crea Categoria</a>
            </div>
        </div>
        <div class="card col-3 mb-5">
            <div class="card-body text-center">
                <h3>Tags</h3>
                <a href="{{ route('admin.tags.create') }}" class="btn btn-primary mt-3">Crea Tag</a>
            </div>
        </div>
    </div>
</div>

@endsection