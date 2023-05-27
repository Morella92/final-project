@extends('layouts.app')

@section('content')
    <div class="container py-5">

        <h2>Ciao {{ Auth::user()->name }}, modifica il tuo profilo!</h2>
        <form class="row g-3" action="{{ route('teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6">
                <label for="phone" class="form-label">Numero di telefono</label>
                <input type="text" name="phone" value="{{ old('phone', $teacher->phone) }}"
                    class="form-control @error('phone') is-invalid @enderror" id="phone"
                    placeholder="Inserisci il tuo contatto">
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label">Indirizzo</label>
                <input type="text" name="address" value="{{ Auth::user()->address }}"
                    class="form-control @error('address') is-invalid @enderror" id="address"
                    placeholder="Inserisci il tuo contatto">
                @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- CHECKBOX --}}
            <div class="mb-3">
                <label for="specializations" class="form-label">Specializzazione *</label>
                <div class="d-flex @error('specializations') is-invalid @enderror flex-wrap gap-3">

                    @foreach ($specializations as $key => $specialization)
                        <div class="form-check">
                            <input name="specializations[]" @checked(in_array($specialization->id, old('specializations[]', $teacher->getSpecializationIds()))) class="form-check-input"
                                type="checkbox" value="{{ $specialization->id }}" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $specialization->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('specializations ')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                @error('specializations')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- PRESTAZIONI --}}

            <div>

                <label class="text-black form-label fw-bold text-uppercase" for="performance">prestazioni</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('performance') is-invalid @enderror" placeholder="Insert performance here"
                        id="performance" name="performance" style="height: 200px">{{ old('performance') }}</textarea>
                    @error('performance')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- CURRICULUM VITAE --}}

            <div class="mt-2">
                <label for="cv" class="form-label fw-bold text-uppercase">Carica Curriculum Vitae in formato
                    immagine</label>
                <div class="input-group mb-3">
                    <input type="file" name="cv" value=""
                        class="form-control @error('cv') is-invalid @enderror" id="inputGroupFile02">

                    @error('cv')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- IMMAGINE DI PROFILO  --}}
            <div>
                <label for="picture" class="form-label fw-bold text-uppercase">Carica immagine di profilo</label>
                <div class="input-group mb-3">
                    <input type="file" value="picture" class="form-control @error('image') is-invalid @enderror"
                        id="inputGroupFile02">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- SUBMIT --}}
            <div class="col-12">

                <button type="submit" class="btn btn-primary">Modifica profilo</button>
            </div>
        </form>
    </div>
@endsection
