@extends('layouts.app')

@section('content')
    {{-- CK EDITITOR CONFIGURATION --}}
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>

    <style type="text/css">
        .ck-editor__editable_inline {
            height: 300px;
        }
    </style>
    <div class="container py-5">
        {{-- intestazione --}}
        <h2 class="text-white">Ciao {{ Auth::user()->name }}, modifica il tuo profilo!</h2>
        <p class="text-white">I campi contrassegnati dall'<span class="fw-bolder text-danger">*</span> sono obbligatori</p>
        {{-- form --}}
        <form class="row g-3" action="{{ route('teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- telefono --}}
            <div class="col-md-6">
                <label for="phone" class="form-label text-white">Numero di telefono</label>
                <input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}"
                    class="message-style form-control @error('phone') is-invalid @enderror" id="phone"
                    placeholder="Inserisci il tuo contatto">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- multiselect specializzazioni --}}
            <div class="mb-3">
                <label for="specializations" class="form-label fw-bold text-uppercase text-white">Specializzazione / i <span
                        class="fw-bolder text-danger">*</span></label>
                <div class="dropdown @error('specializations') is-invalid @enderror">
                    <button class="message-style  btn btn-white dropdown-toggle text-white" type="button" id="specializationsDropdown" required
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Seleziona una o più specializzazioni <span class="fw-bolder text-danger">*</span>
                    </button>
                    <div class="dropdown-menu dd-create" aria-labelledby="specializationsDropdown">
                        @foreach ($specializations as $key => $specialization)
                            <div class="form-check">
                                <input name="specializations[]" @if (in_array($specialization->id, old('specializations', $teacher->getSpecializationIds()))) checked @endif
                                    class="form-check-input" type="checkbox" value="{{ $specialization->id }}"
                                    id="specialization_{{ $specialization->id }}">
                                <label class="form-check-label me-3" for="specialization_{{ $specialization->id }}">
                                    {{ $specialization->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                @error('specializations')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- PRESTAZIONI --}}

            <div>

                <label class="text-black form-label fw-bold text-uppercase text-white" for="performance">Prestazioni</label>
                <div class="form-floating mb-3">
                    <textarea class="message-style form-control @error('performance') is-invalid @enderror" placeholder="Insert performance here"
                        id="performance" name="performance" style="height: 200px">{{ old('performance') ?? $teacher->performance }}</textarea>
                    @error('performance')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- MODIFICA CV E IMG DI PROFILO --}}

            <div class="col-12">

                <div class="mt-2">
                    <label for="cv" class="form-label fw-bold text-uppercase text-white">Carica Curriculum Vitae in formato
                        immagine</label>
                    <div class="input-group mb-3">
                        <input type="file" name="cv" value=""
                            class="message-style form-control @error('cv') is-invalid @enderror" id="inputGroupFile02">

                        @error('cv')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="mt-2">
                    <label for="cv" class="form-label fw-bold text-uppercase text-white">Carica l'immagine di profilo</label>
                    <div class="input-group mb-3">
                        <input type="file" name="picture" value=""
                            class="message-style form-control @error('picture') is-invalid @enderror" id="inputGroupFile02">

                        @error('picture')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                {{-- SUBMIT --}}
                <div class="col-12">

                    <button type="submit" class="modify-button modify-link">Modifica profilo</button>
                </div>
        </form>
    </div>

    <script>
        CKEDITOR.replace('performance', {
            toolbar: [{
                    name: 'clipboard',
                    items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo']
                },

                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote',
                        '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr',
                        'BidiRtl'
                    ]
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink', 'Anchor']
                },
                {
                    name: 'insert',
                    items: ['Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe']
                },
                {
                    name: 'styles',
                    items: ['Styles', 'Format', 'Font', 'FontSize']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                }
            ]
        });
    </script>

    <script>
        // Aggiorno il testo del pulsante con il numero di specializzazioni selezionate
        function updateSelectedCount() {
            const selectedCount = document.querySelectorAll('input[name="specializations[]"]:checked').length;
            const dropdownButton = document.getElementById('specializationsDropdown');
            dropdownButton.textContent = `Seleziona specializzazioni (${selectedCount})`;
        }

        // Aggiorno il conteggio iniziale
        updateSelectedCount();

        // Aggiorno il conteggio quando una checkbox viene selezionata/deselezionata
        const checkboxes = document.querySelectorAll('input[name="specializations[]"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                updateSelectedCount();
            });
        });
    </script>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            var specializationCheckboxes = document.querySelectorAll('input[name="specializations[]"]');
            var specializationError = document.getElementById('specializationsError');
            var hasCheckedSpecialization = false;

            for (var i = 0; i < specializationCheckboxes.length; i++) {
                if (specializationCheckboxes[i].checked) {
                    hasCheckedSpecialization = true;
                    break;
                }
            }

            if (!hasCheckedSpecialization) {
                event.preventDefault();
                specializationError.style.display = 'block';
            } else {
                specializationError.style.display = 'none';
            }
        });
    </script>

    <script>
        var specializationCheckboxes = document.querySelectorAll('input[name="specializations[]"]');
        var specializationError = document.getElementById('specializationsError');

        for (var i = 0; i < specializationCheckboxes.length; i++) {
            specializationCheckboxes[i].addEventListener('change', function() {
                var hasCheckedSpecialization = false;

                for (var j = 0; j < specializationCheckboxes.length; j++) {
                    if (specializationCheckboxes[j].checked) {
                        hasCheckedSpecialization = true;
                        break;
                    }
                }

                if (!hasCheckedSpecialization) {
                    specializationError.style.display = 'block';
                } else {
                    specializationError.style.display = 'none';
                }
            });
        }
    </script>
@endsection
