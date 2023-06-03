@extends('layouts.app')

@section('content')
    <div class="container py-5 d-flex flex-column">
        {{-- NOME --}}
        <h1 class="text-center text-white">{{ $teacher->user->name }}</h1>
        {{-- IMG PROFILO --}}
        @if ($teacher->id <= 16)
            <img src="{{ $teacher->picture }}" class="message-style align-self-center mb-4" alt="...">
        @else
        @endif
        <img src="{{ $teacher->picture_path }}" alt="" class="show-profile-img">
        {{-- SPECIALIZZAZIONI --}}
        @forelse ($teacher->specializations()->get() as $specialization)
            <p class="card-text">
                <span class="fw-bold style-show"> {{ $specialization->name }}</span>
                <span class="badge modify-button modify-link fw-bold"> {{ $specialization->expertise }} </span>
            </p>
            <p class="text-white scb-description">{{ $specialization->description }}</p>
        @empty
            -
        @endforelse
        {{-- CONTATTI --}}
        <div class="d-flex justify-content-around py-3">
            <div>
                <h3 class="style-show">Contatti</h3>
                <p class="card-text">
                    <span class="fw-bold my-2 style-show">Email: <span
                            class="text-white fw-light">{{ $teacher->user->email }}; <br></span></span>
                    <span class="fw-bold my-2 style-show">Indirizzo: <span
                            class="text-white fw-light">{{ $teacher->user->address }}; <br></span></span>
                    @if ($teacher->phone)
                        <span class="fw-bold my-2 style-show">Numero: <span
                                class="text-white fw-light">{{ $teacher->phone }};</span></span>
                    @endif
                </p>
            </div>
            {{-- CV --}}
            <div class="accordion" id="accordionExample">
                <div class="accordion-item modify-button">
                    <h2 class="accordion-header">
                        <button class="cv-button ms-3" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h3 class="fs-4 modify-link">Curriculum Vitae</h3>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse cv-accordion"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @if ($teacher->id <= 16)
                                <img src="{{ $teacher->cv }}" class="message-style align-self-center mb-4" alt="...">
                            @else
                            @endif
                            <img src="{{ $teacher->cv_path }}" alt="">
                            {{-- visualizza cv in pdf --}}
                            <div class="d-flex justify-content-around mt-3">
                                <div class="d-flex justify-content-around mt-3">
                                    @isset($teacher->pdf_cv)
                                        <a href="{{ url('/storage/' . $teacher->pdf_cv) }}" target="_blank"
                                            class="btn btn-primary">Visualizza PDF</a>
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div>
            <p>
                @php
                    echo $teacher->performance;
                @endphp
            </p>
            <button class="modify-button">
                <a class="modify-link" href="{{ route('teachers.edit', Auth::user()->teacher->id) }}">
                    Modifica il tuo profilo
                </a>
            </button>

        </div>

    </div>
@endsection
