@extends('layouts.auth')

@section('content')
    {{-- NEW --}}
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

                                        <div class="d-flex justify-content-center align-items-center mb-2">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <div class="log-logo_small">
                                                <img src="{{ asset('/img/varie/logo_small.png') }}" alt="">
                                            </div>
                                        </div>

                                        <h5 class="fw-bold text-center mb-3 pb-3  text-white text-uppercase"
                                            style="letter-spacing: 1px;">Accedi
                                            all'area riservata</h5>
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
                                        {{-- remember me --}}
                                        <div class="">
                                            <div class="form-check my-4  text-white">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label" for="remember">
                                                    Ricordati di me
                                                </label>
                                            </div>
                                        </div>
                                        {{-- login --}}
                                        <div class=>
                                            <button type="submit" class="btn log-login-btn">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn log-link" href="{{ route('password.request') }}">Password
                                                    dimenticata?</a>
                                            @endif
                                        </div>

                                        {{-- registrati --}}
                                        <p class=" pb-lg-2 mt-3  text-white" style="color: #393f81;">Non sei ancora
                                            registrato?
                                        </p>
                                        <div class="log-btn">
                                            <div>
                                                <button type="button" class="btn log-btn-create fw-bold">
                                                    <a class="nav-link" href="{{ route('register') }}">
                                                        Crea account</a>
                                                </button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn log-btn-front fw-bold">
                                                    <a class="nav-link" href="#">Prosegui navigazione</a>
                                                </button>
                                            </div>

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
