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
        <div class="d-flex justify-content-around py-3">
            <div>
                <h3>Contatti</h3>
                <p class="card-text">  
                    <span class="fw-bold my-2">Email:</span> {{$teacher->user->email}}; <br>
                    <span class="fw-bold my-2">Indirizzo:</span> {{$teacher->address}}; <br>
                    <span class="fw-bold my-2">Numero:</span> {{$teacher->phone}};
                </p>
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                  <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <h3>Curriculum Vitae</h3>
                    </button>
                  </h2>
                  <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <img src="{{$teacher->cv}}" alt="">
                    </div>
                  </div>
                </div>
            </div>
            
        </div>



    </div>
@endsection