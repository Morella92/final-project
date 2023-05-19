@extends('layouts.app')

@section('content')

    <div class="container">
        @foreach($teachers as $teacher)
            <p>{{$teacher->user->name}}</p>
            <p>{{$teacher->address}}</p>
{{-- @dd($teacher) --}}
        @endforeach
    </div>

@endsection

