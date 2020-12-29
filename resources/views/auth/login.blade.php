@extends('layouts.app')

@section('content')
<div class="login-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-5">
                <div class="form-input-content">
                    <div class="card card-login">
                        <div class="card-header" style="padding-top: .25rem !important; padding-bottom: .25rem !important;">
                            <div class="nav-header position-relative text-center w-100">
                                <div class="brand-logo">
                                    <a href="/">
                                        <b class="logo-abbr">TDL</b>
                                        <span class="brand-title"><b>{{ env("app_name") }}</b></span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <h2>Login</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Senha') }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                {{-- <div class="form-group ml-3 mb-5">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="label-checkbox ml-2 mb-0" for="checkbox1">Remember Me</label>
                                </div> --}}
                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">Entrar</button>
                            </form>
                        </div>

                        <div class="card-footer text-center border-0 pt-0">
                            <p class="mb-1">Ainda não tem uma conta?</p>
                            <a href="{{ route('register') }}" class="btn btn-lg btn-info btn-block border-0">Clique aqui e crie uma conta pra você</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
