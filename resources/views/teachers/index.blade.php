@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <div class="row justify-content-around gy-5">
            @foreach ($teachers as $teacher)
                <div class="card col-5 message-style">
                    @if ($teacher->id <= 16)
                        <img src="{{ $teacher->picture }}" class="align-self-center mb-4" alt="...">
                    @else
                        <img src="{{ asset('storage/' . $teacher->picture) }}" alt="">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $teacher->user->name }}</h5>
                        <p class="card-text">
                            <span class="fw-bold">Email:</span> {{ $teacher->user->email }}; <br>
                            <span class="fw-bold">Address:</span> {{ $teacher->user->address }}; <br>
                            @if ($teacher->phone)
                                <span class="fw-bold">Phone:</span> {{ $teacher->phone }}
                            @endif
                        </p>

                        @forelse ($teacher->specializations()->get() as $specialization)
                            <p class="card-text">
                                <span class="fw-bold"> {{ $specialization->name }}</span>
                                <span class="badge text-bg-success"> {{ $specialization->expertise }} </span>
                            </p>
                        @empty
                            -
                        @endforelse

                        <button class="edit-button">
                            <a class="edit-link" href="{{ route('teachers.show', $teacher) }}">Guarda il profilo</a>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>


    </div>
@endsection
