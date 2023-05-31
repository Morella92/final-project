@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-white">Messaggi ricevuti</h1>

        <table class="table table-striped table-inverse table-responsive bg-white message-style">
            <thead>
                <tr>
                    <th scope="col">Data</th>
                    <th scope="col">Mittente</th>
                    <th scope="col">Email</th>
                    <th scope="col">Oggetto</th>
                    <th scope="col" class=" text-center">Leggi</th>
                    <th scope="col" class=" text-center">Cancella</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($messages as $message)
                    <tr>
                        <td>{{ $message->created_at->format('d/m/y')}}</td>
                        <td>{{ $message->ui_name }}</td>
                        <td>{{ $message->ui_email }}</td>  
                        <td>{{ $message->title }}</td>
                        <td class=" text-center">
                            <a class="text-success" href="{{ route('messages.show', ['message' => $message->id]) }}">
                                <i class="fa-solid fa-eye text-center"></i>
                            </a>
                        </td>
                        <td class=" text-center"><a href="#"><i class="fa-solid fa-trash text-danger"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    
    </div>
@endsection
