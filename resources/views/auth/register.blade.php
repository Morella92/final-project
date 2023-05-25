@extends('layouts.auth')

@section('content')
    {{-- NEW --}}
    <section class="vh-100" style="background-color: black;">

        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card bg-transparent" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                                    alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold  text-white">Logo</span>
                                        </div>

                                        <h5 class="fw-bold text-center mb-3 pb-3  text-white text-uppercase"
                                            style="letter-spacing: 1px;">
                                            crea account</h5>

                                        {{-- name --}}
                                        <div class="mb-4 row">
                                            <label for="name" class="col-form-label text-md-right text-white">Nome e
                                                cognome</label>

                                            <div class="">
                                                <input id="name" type="text"
                                                    class="form-control  @error('name') is-invalid @enderror" name="name"
                                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- email --}}
                                        <div class="mb-4 row">
                                            <label for="email"
                                                class="col-md-4 col-form-label text-white text-md-right">Indirizzo
                                                E-mail</label>

                                            <div class="">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- password --}}
                                        <div class="mb-4 row">
                                            <label for="password"
                                                class="col-form-label text-md-right text-white">Password</label>

                                            <div class="">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>

                                        {{-- conferma password --}}
                                        <div class="mb-4 row">
                                            <label for="password-confirm"
                                                class="col-form-label text-md-right text-white">Conferma Password</label>

                                            <div class="">
                                                <input id="password-confirm" type="password" class="form-control"
                                                    name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        {{-- address --}}
                                        <div class="mb-4 row">
                                            <label for="address"
                                                class="col-md-4 col-form-label text-md-right text-white">Indirizzo</label>
                                            <div class="">
                                                <input id="address" type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    name="address" value="{{ old('address') }}" autofocus>

                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- bottoni --}}
                                        <div class="mb-4 row mb-0 d-flex justify-content-around">

                                            <button type="submit" class="col-4 btn btn-primary">
                                                <a class="nav-link">
                                                    Registrati
                                                </a>
                                            </button>
                                            <button type="button" class="col-4 btn btn-outline-warning fw-bold">
                                                <a class="nav-link" href="{{ route('login') }}">
                                                    Torna indietro
                                                </a>
                                            </button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
