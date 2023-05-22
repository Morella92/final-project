@extends('layouts.app')

@section('content')
    <div class="container py-5 d-flex flex-column">
        <h1 class="text-center">{{$teacher->user->name}}</h1>
        <img src="{{$teacher->picture}}" class="align-self-center mb-4" alt="...">
        @forelse ($teacher->specializations()->get() as $specialization)
            <p class="card-text">
                <span class="fw-bold"> {{$specialization->name}}</span>
                <span class="badge text-bg-success"> {{$specialization->expertise}} </span> 
            </p>
            <p>{{$specialization->description}}</p>
        @empty
            -
        @endforelse
        <div>
            <h3>Contatti</h3>
            <p class="card-text">  
                <span class="fw-bold my-2">Email:</span> {{$teacher->user->email}}; <br>
                <span class="fw-bold my-2">Indirizzo:</span> {{$teacher->address}}; <br>
                <span class="fw-bold my-2">Numero:</span> {{$teacher->phone}};
            </p>
        </div>
    </div>
@endsection