@extends('layouts.app')

@section('content')
    <section class="message-section">
        <div class="container py-5">
            <div class="card message-style" style="margin: 0 auto;">
                <div class="card-body">
                    <h5 class="card-title mb-4">Da: {{ $message->ui_name }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary mb-3">Telefono: {{ $message->ui_phone }}</h6>
                    <h6 class="card-subtitle mb-2 text-body-secondary mb-3">
                        Ricevuto il: {{ $message->created_at->format('d/m/y') }}
                        <span>alle ore: {{ $message->created_at->format('h:m') }}</span>
                    </h6>
                    <h6 class="card-subtitle mt-5 text-body-secondary mb-3">Oggetto: {{ $message->title }}</h6>
                    <p class="card-text text-style">{{ $message->text }}</p>

                    <div class="d-flex justify-content-end gap-4">
                        <a href="{{ route('messages.index') }}">
                            <i class="fa-solid fa-rotate-left fa-shake text-success fs-4"></i>
                        </a>


                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
