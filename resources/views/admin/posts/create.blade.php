@extends('layouts.admin')

@section('content')

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Elementi</h1>
    </div>

    <h2>Crea un nuovo Post</h2>
    <div class="create">
        @include('partials.error')
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" class="form-control @error('title') is-invalid @enderror" aria-describedby="titleHelper" placeholder="Inserisci il nome" value="{{ old('title') }}">
                <small id="titleHelper" class="form-text text-muted">Scrivi il titolo del post, max 255 caratteri</small>
                @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control" name="image" id="image" class="form-control @error('image') is-invalid @enderror" aria-describedby="imageHelper" accept="images/*">
                <small id="imageHelper" class="form-text text-muted">Scrivi il link completo dell' immagine, max 255 caratteri</small>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Categoria</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="" selected>Seleziona una categoria</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    @error('category_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </select>
            </div>
            <div class="mb-3">
                <label for="tags" class="form-label">Tags</label>
                <select multiple class="form-select" name="tags[]" id="tags">
                    <option disabled>Seleziona uno o pi?? tag</option>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Descrizione</label>
                <textarea placeholder="Inserisci la descrizione" class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5">{{ old('body') }}</textarea>
                @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="text-center pb-5">
                <button type="submit" class="btn btn-success w-25">Salva</button>
            </div>
        </form>
    </div>
</div>

@endsection