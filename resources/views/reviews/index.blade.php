@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-white">Recensioni</h1>

        <table class="table table-striped table-inverse table-responsive bg-white message-style">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Recensione</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>{{ $review->created_at->format('d/m/y')}}</td>
                        <td>{{ $review->text }}</td>
                    </tr>
                @endforeach
            </tbody>  
        </table>
    </div>
@endsection