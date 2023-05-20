@extends('layouts.app')

@section('content')

    <div class="container">
        {{-- @dd($teachers) --}}
        @foreach($teachers as $teacher)
            <p>{{$teacher->user->name}}</p>
            <p>{{$teacher->address}}</p>
            {{-- @dd($teachers) --}}
            
        @endforeach
    </div>

@endsection

