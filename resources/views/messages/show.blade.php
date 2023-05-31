@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1>Da: {{ $message->ui_name }}</h1>
        {{-- @dd($message) --}}
    </div>
@endsection
