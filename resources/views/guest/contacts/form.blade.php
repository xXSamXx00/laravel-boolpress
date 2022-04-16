@extends('layouts.app')

@section('content')
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Contact Us</h1>
            <p class="lead">Contattaci per info</p>
            <form action="{{ route('contacts.send') }}" method="post">
                @csrf
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        <strong>{{ session('message') }}</strong>
                    </div>
                @endif
                @include('partials.error')
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nome completo"
                                aria-describedby="nameHelper" required minlength="5" maxlength="50"
                                value="{{ old('name') }}">
                            <small id="nameHelper" class="text-muted">Scrivi il tuo nome, Max: 50</small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelpId" placeholder="Email" required value="{{ old('email') }}">
                            <small id="emailHelpId" class="form-text text-muted">Scrivi la tua email</small>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="5">{{ old('message') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
@endsection
