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
                            <h2>Criar conta</h2>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Nome') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

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

                                <div class="form-group mb-4">
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirme a senha') }}">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button class="btn btn-lg btn-primary btn-block border-0" type="submit">{{ __('Criar conta') }}</button>
                            </form>
                        </div>

                        <div class="card-footer text-center border-0 pt-0">
                            <p class="mb-1">Já tem uma conta?</p>
                            <a href="{{ route('login') }}" class="btn btn-lg btn-info btn-block border-0">Clique aqui para fazer o Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
