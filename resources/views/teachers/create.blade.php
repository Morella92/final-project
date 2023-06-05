@extends('layouts.app')

@section('content')
    {{-- CK EDITITOR CONFIGURATION --}}
    <script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
    >
    <style type="text/css">
        .ck-editor__editable_inline {
            height: 300px;
        }
    </style>

    <div class="container py-5">

        <h2 class="text-white">Ciao {{ Auth::user()->name }}, completa il tuo profilo da professore!</h2>
        <p class="text-white">I campi contrassegnati dall'<span class="fw-bolder text-danger">*</span> sono obbligatori</p>
        <form class="row g-3" action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- multiselect specializzazioni --}}
            <div class="mb-3">
                <label for="specializations" class="text-white form-label fw-bold text-uppercase">Specializzazione / i <span
                        class="fw-bolder text-danger">*</span></label>
                <div class="dropdown @error('specializations') is-invalid @enderror">
                    <button class="btn btn-white dropdown-toggle text-white message-style" type="button" id="specializationsDropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    </button>
                    <div class="dropdown-menu dd-create" aria-labelledby="specializationsDropdown">
                        @foreach ($specializations as $key => $specialization)
                            <div class="form-check">
                                <input name="specializations[]" @if (in_array($specialization->id, old('specializations', []))) checked @endif
                                    class="message-style form-check-input" type="checkbox" value="{{ $specialization->id }}"
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

                <label class="text-white mb-1 fw-bold" for="performance">PRESTAZIONI</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('performance') is-invalid @enderror" placeholder="Insert performance here"
                        id="performance" name="performance" style="height: 200px">{{ old('performance') ?? '' }}</textarea>
                    @error('performance')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            {{-- TELEFONO --}}
            <div class="col-md-6">
                <label for="phone" class="text-white form-label fw-bold text-uppercase">Numero di telefono</label>
                <input type="text" name="phone" value=""
                    class="message-style form-control @error('phone') is-invalid @enderror" id="phone"
                    placeholder="Inserisci il tuo contatto">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- UPLOAD --}}
            {{-- PROFILE IMG --}}
            <div class="mt-2">
                <label for="cv" class="text-white form-label fw-bold text-uppercase">Carica l'immagine di profilo</label>
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

            {{-- CV --}}
            <div class="col-12">

                <div class="mt-2">
                    <label for="cv" class="text-white form-label fw-bold text-uppercase">Carica Curriculum Vitae in formato
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
                {{-- formato pdf --}}
                <div>
                    <input type="file" name="pdf_cv" value=""
                        class="message-style form-control @error('pdf_cv') is-invalid @enderror" id="inputGroupFile02">
                    @error('pdf_cv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>


                {{-- SUBMIT --}}
                <div class="col-12 mt-3">
                    <button type="submit" class="modify-button">
                        <a href="modify-link">
                            Crea profilo
                        </a> 
                    </button>
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
