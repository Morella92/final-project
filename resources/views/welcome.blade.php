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

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="d-flex align-items-center mb-3 pb-1">
                                            <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                                            <span class="h1 fw-bold mb-0 text-white">Logo</span>
                                        </div>

                                        <h5 class="fw-normal mb-3 pb-3  text-white" style="letter-spacing: 1px;">Accedi al
                                            tuo pannello amministrazione</h5>
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
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Login') }}
                                            </button>

                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">Password
                                                    dimenticata</a>
                                            @endif
                                        </div>



                                        {{-- registrati --}}
                                        <p class="mb-5 pb-lg-2 mt-3  text-white" style="color: #393f81;">Non sei ancora
                                            registrato? <br>
                                            <button type="button" class="btn btn-outline-danger fw-bold mt-3">
                                                <a class="nav-link" href="{{ route('register') }}">
                                                    Crea account</a>
                                            </button>

                                            <button type="button" class="btn btn-outline-warning fw-bold mt-3 ms-5">
                                                <a class="nav-link" href="#">Prosegui navigazione</a>
                                            </button>
                                        </p>
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
