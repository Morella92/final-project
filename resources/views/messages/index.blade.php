@extends('layouts.app')

@section('content')
    <h1>INDEX Messaggi</h1>

    @foreach ($messaggi as $messaggio)
        <ul>
            <li>DA: {{ $messaggio->ui_name }}</li>
            <li>PER: {{ $messaggio->teacher_id }}</li>
            <li>EMAIL: {{ $messaggio->ui_email }}</li>
            <li>TEL:{{ $messaggio->ui_phone }}</li>
            <li>TITOLO: {{ $messaggio->title }}</li>
            <li>TESTO: {{ $messaggio->text }}</li>

        </ul>
    @endforeach
@endsection
