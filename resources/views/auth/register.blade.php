@extends('layouts.auth')

@section('content')
    <section class="log-section">
        <div class="container py-3 log-container">
            <div class="row">
                <div class="col col-xl-10 ">
                    <div class="log-card card bg-transparent">
                        <div class="row d-flex">
                            <div class="col-md-6 col-lg-5 d-none d-md-block log-script">
                                <img src="{{ asset('/img/varie/main.png') }}" alt="login form" class="img-fluid log-img-form"
                                    style="border-radius: 1rem 0 0 1rem;" />
                                <img class="log-text_logo" src="{{ asset('/img/varie/text_logo.png') }}" alt="">
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex">
                                <div class="card-body px-3 px-lg-4 text-black log-card_body">

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="d-flex justify-content-center align-items-center ">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <div class="log-logo_small log-logo_small-reg">
                                                <img src="{{ asset('/img/varie/logo_small.png') }}" alt="">
                                            </div>
                                        </div>

                                        <h5 class="fw-bold text-center mb-2 pb-2  text-white text-uppercase"
                                            style="letter-spacing: 1px;">Crea Account</h5>
                                        {{-- nome e cognome --}}
                                        <div class="mb-2 row">
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
                                        <label for="email"
                                            class="col-form-label text-md-right  text-white">{{ __('E-Mail Address') }}</label>

                                        <div class="">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- password --}}
                                        <label for="password"
                                            class=" text-white col-form-label text-md-right">{{ __('Password') }}</label>

                                        <div class="">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- conferma password --}}
                                        <div class="mb-2 row">
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
                                        <div class="row d-flex justify-content-around">

                                            <button type="submit" class="col-4 btn log-btn-create fw-bold">
                                                <a class="nav-link">
                                                    Registrati
                                                </a>
                                            </button>
                                            <button type="button" class="col-4 btn log-btn-front fw-bold">
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
