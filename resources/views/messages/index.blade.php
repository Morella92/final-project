@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-white">Messaggi ricevuti</h1>
        {{-- cestino --}}
        @if ($trashed)
            <button class="modify-button text-uppercase mb-3">
                <a class="modify-link" href="{{ route('messages.trashed') }}"><b>{{ $trashed }}</b> messaggio/i nel
                    cestino
                </a>
            </button>
            
        @endif

        {{-- TABELLA --}}
        <div class="table-responsive">

            <table class="table table-striped table-inverse bg-white message-style">
                <thead>
                    <tr>
                        <th scope="col">Ricezione</th>
                        <th scope="col">Mittente</th>
                        <th scope="col">Email</th>
                        <th scope="col">Oggetto</a></th>
                        <th scope="col" class=" text-center">Leggi</th>
                        <th scope="col" class=" text-center">Cancella</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($messages as $message)
                        <tr>
                            <td>
                                {{ $message->created_at->format('d-m-Y') }}
                            </td>
                            <td>{{ $message->ui_name }}</td>
                            <td>{{ $message->ui_email }}</td>
                            <td>{{ $message->title }}</td>
                            <td class=" text-center">
                                {{-- VAI ALLA SHOW DEL MESSAGGIO --}}
                                <a class="text-success" href="{{ route('messages.show', ['message' => $message->id]) }}">
                                    <i class="fa-solid fa-eye fa-bounce text-center"></i>
                                </a>
                            </td>
                            <td class=" text-center">
                                {{-- CESTINA IL MESSAGGIO --}}
                                <form class="d-inline delete" action="{{ route('messages.destroy', $message->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="scb-delete" title="delete"><i
                                            class="fa-solid fa-trash fa-shake" style="color: #c74f0f;"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- **************************
    SRIPT
************************** --}}
    <script>
        var popup = document.getElementById('popup_message');
        if (popup) {
            // show a message in a toast
            Swal.fire({
                toast: true,
                animation: false,
                icon: popup.dataset.type,
                title: popup.dataset.message,
                type: popup.dataset.type,
                position: 'top-right',
                timer: 3000,
                showConfirmButton: false,
            });
        }

        const deleteBtns = document.querySelectorAll('form.delete');

        deleteBtns.forEach((formDelete) => {
            formDelete.addEventListener('submit', function(event) {
                event.preventDefault();
                var doubleconfirm = event.target.classList.contains('double-confirm');
                Swal.fire({
                    title: 'Sei sicuro? ',
                    text: "Per favore conferma la tua richiesta !",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'ANNULLA',
                    confirmButtonText: 'CONFERMA'
                }).then((result) => {
                    if (result.value) {

                        // if double confirm
                        if (doubleconfirm) {

                            Swal.fire({
                                title: 'L\'operazione che stai per eseguire non sarà reversibile, sei sicuro di voler procedere?',
                                html: "Digita <b>CONFIRM</b> nel box sottostante",
                                input: 'text',
                                type: 'warning',
                                inputPlaceholder: 'CONFIRM',
                                showCancelButton: true,
                                confirmButtonText: 'CONFERMA',
                                cancelButtonText: 'ANNULLA',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: () => !Swal.isLoading(),
                                preConfirm: (txt) => {
                                    return (txt.toUpperCase() == "CONFIRM");
                                },

                            }).then((result) => {
                                if (result.value) this.submit();
                            })
                        } else {
                            this.submit();
                        }


                    }
                });


            });

        });
    </script>
@endsection

@section('script')
    @vite('resources/js/confirmDelete.js')
@endsection
