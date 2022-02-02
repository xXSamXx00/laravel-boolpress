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

                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h3>Tags</h3>
                    <ul>

                    </ul>
                </div>
            </div>
        </aside>
        <div class="col-9">
            <div class="row">
                <div class="col-3" v-for="post in posts">
                    <a href="">
                        <div class="content">
                            <img class="img-fluid" :src="post.image" :alt="post.title">
                            <h3>@{{post.title}}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection