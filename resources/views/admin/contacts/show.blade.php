@extends('layouts.admin')

@section('content')
    <div class="messages text-center">
        <h1>You have a new message</h1>

        <dl>
            <dd>Name: {{ $contact->name }}</dd>
            <dd>Email: {{ $contact->email }}</dd>
        </dl>
        <div class="message">
            <p>
                {{ $contact->message }}
            </p>
        </div>
    </div>
@endsection
