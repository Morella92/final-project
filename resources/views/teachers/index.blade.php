@extends('layouts.app')

@section('content')

    <div class="container">
        
        <div class="row gap-3">
            @foreach($teachers as $teacher)
                <div class="card col-4">
                    <img src="{{$teacher->picture}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$teacher->user->name}}</h5>
                        <p class="card-text">
                            <span class="fw-bold">Email:</span> {{$teacher->user->email}}; <br>
                            <span class="fw-bold">Address:</span> {{$teacher->address}}; <br>
                            <span class="fw-bold">Phone:</span> {{$teacher->phone}}
                        </p>
                        
                        @forelse ($teacher->specializations()->get() as $specialization)
                            <p class="card-text">
                               <span class="fw-bold"> {{$specialization->name}}</span>
                               <span class="badge text-bg-success"> {{$specialization->expertise}} </span> 
                            </p>
                        @empty
                            -
                        @endforelse
                                      
                        <a href="{{ route('teachers.show', $teacher)}}" class="btn btn-primary">Guarda il profilo</a>
                    </div>   
                </div>
            @endforeach
        </div>
        
        
    </div>

@endsection

