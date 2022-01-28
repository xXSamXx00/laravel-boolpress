@extends('layouts.admin')

@section('content')

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Elementi</h1>
    </div>

    <h2>Crea un nuovo Tag</h2>
    <div class="create">
        @include('partials.error')
        <form action="{{ route('admin.tags.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome Tag</label>
                <input type="text" class="form-control" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelper" placeholder="Inserisci il nome" value="{{ old('name') }}">
                <small id="nameHelper" class="form-text text-muted">Scrivi il nome del tag, max 255 caratteri</small>
                @error('name')
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