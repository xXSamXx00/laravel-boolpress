@extends('layouts.admin')

@section('content')

<div class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Elementi</h1>
    </div>

    <h2>Categorie</h2>
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="text-end mb-3">
        <a class="btn btn-primary" href="{{ route('admin.categories.create') }}" role="button">Crea una Categoria</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Creato il</th>
                    <th scope="col">Aggiornato il</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $category->id }}">
                            <i class="fas fa-trash"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="delete{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="modal_{{ $category->id }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Eliminare definitivamente la categoria numero <strong>{{ $category->id }}</strong>?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Stai per eliminare definitivamente la categoria <strong>{{ $category->name }}</strong>! Sei sicuro di voler continuare?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="category">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>

@endsection