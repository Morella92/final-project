@extends('layouts/app')

@section('content')
    <section class="container">
        <div class="row">

            <div class="col-12 ">
                <div>
                    <div class="col-6">
                        <h2 class="text-white fw-bold">Cestino</h2>
                    </div>
                    <div class="col-6 text-end">
                        @if (count($messages))
                            {{-- RESTORE ALL --}}
                            <form class="d-inline delete double-confirm" action="{{ route('messages.restore-all') }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="modify-button modify-link text-uppercase" title="restore all"><i
                                        class="fa-solid fa-recycle fa-beat" style="color: #1f5130;"></i>&nbsp;Ripristina
                                    tutti
                                </button>
                            </form>
                            {{-- SVUOTA CESTINO --}}
                            <form class="d-inline delete double-confirm" action="{{ route('messages.destroy.all') }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="my-2 btn btn-danger fw-bolder text-end rounded"
                                    value="SVUOTA CESTINO">
                            </form>
                        @endif
                    </div>
                    {{-- TABELLA --}}
                    <div class="table-responsive">
                        <table class="table table-striped table-inverse bg-white message-style">
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
                                                <button type="submit" class="scb-delete" title="restore"><i
                                                        class="fa-solid fa-recycle fa-beat"
                                                        style="color: #1f5130;"></i></button>
                                            </form>
                                        </td>
                                        <td class=" text-center">
                                            {{-- FORCE DELETE SINGOLO --}}
                                            <form class="d-inline delete double-confirm"
                                                action="{{ route('messages.force-delete', $message->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="scb-delete" title="delete"><i
                                                        class="fa-solid fa-trash fa-shake" style="color: #c74f0f;"></i></button>
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
                </div>
                {{-- COUNTER --}}
                <div class="card-footer text-end text-white">
                    <b>{{ count($messages) }}</b> messaggio/i
                </div>
                {{-- GO BACK --}}
                <button class="modify-button">
                    <a class="modify-link" href="{{ route('messages.index') }}">
                        INDIETRO
                    </a>
                </button>
            </div>
        </div>
    </section>

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
