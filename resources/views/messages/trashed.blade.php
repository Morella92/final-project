@extends('layouts/app')

@section('content')
    <section class="container">
        <div class="row">

            <div class="col-12 ">
                <div>
                    <div class="col-6">
                        <h2>Cestino</h2>
                    </div>
                    <div class="col-6 text-end">
                        @if (count($messages))
                            <form class="d-inline delete double-confirm" action="{{ route('messages.restore-all') }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary" title="restore all"><i
                                        class="fa-solid fa-recycle"></i>&nbsp;Ripristina tutti</button>
                            </form>
                        @endif
                    </div>

                    <table class="table table-striped table-inverse table-responsive bg-white message-style">
                        <thead>
                            <tr>
                                <th scope="col">Data</th>
                                <th scope="col">Mittente</th>
                                <th scope="col">Email</th>
                                <th scope="col">Oggetto</th>
                                <th scope="col" class=" text-center">Ripristina</th>
                                <th scope="col" class=" text-center">Cancella</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($messages as $message)
                                <tr>
                                    <td>{{ $message->created_at->format('d/m/y') }}</td>
                                    <td>{{ $message->ui_name }}</td>
                                    <td>{{ $message->ui_email }}</td>
                                    <td>{{ $message->title }}</td>
                                    <td class=" text-center">
                                        <form class="d-inline" action="{{ route('messages.restore', $message->id) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success" title="restore"><i
                                                    class="fa-solid fa-recycle"></i></button>
                                        </form>
                                    </td>
                                    <td class=" text-center">
                                        <form class="d-inline delete double-confirm"
                                            action="{{ route('messages.force-delete', $message->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" title="delete"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h2>
                                    Nessun messaggio
                                </h2>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <b>{{ count($messages) }}</b> messaggio/i
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection
