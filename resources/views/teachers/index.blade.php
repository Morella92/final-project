@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($teachers as $teacher)
            <p>{{$teacher->name}}</p>
            <p>{{$teacher->address}}</p>

        @endforeach
    </div>

@endsection

