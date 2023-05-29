@extends('layouts.app')

@section('content')
    <div class="container py-5 d-flex flex-column">
        {{-- NOME --}}
        <h1 class="text-center">{{ $teacher->user->name }}</h1>
        {{-- IMG PROFILO --}}
        <img src="{{ $teacher->picture_path }}" alt="">
        @forelse ($teacher->specializations()->get() as $specialization)
            <p class="card-text">
                <span class="fw-bold"> {{ $specialization->name }}</span>
                <span class="badge text-bg-success"> {{ $specialization->expertise }} </span>
            </p>
            <p>{{ $specialization->description }}</p>
        @empty
            -
        @endforelse
        {{-- CONTATTI --}}
        <div class="d-flex justify-content-around py-3">
            <div>
                <h3>Contatti</h3>
                <p class="card-text">
                    <span class="fw-bold my-2">Email:</span> {{ $teacher->user->email }}; <br>
                    <span class="fw-bold my-2">Indirizzo:</span> {{ $teacher->user->address }}; <br>
                    @if ($teacher->phone)
                        <span class="fw-bold my-2">Numero:</span> {{ $teacher->phone }};
                    @endif
                </p>
            </div>
            {{-- CV --}}
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button cv-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h3>Curriculum Vitae</h3>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse cv-accordion"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <img src="{{ $teacher->cv_path }}" alt="">
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
            {{-- DELETE --}}
            <form action="{{ route('teachers.destroy', $teacher) }}" method="POST">
                @csrf
                @method('DELETE')
                <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
            </form>
        </div>



    </div>
@endsection
