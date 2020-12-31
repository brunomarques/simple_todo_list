@extends('layouts.app')

@section('content')
<p class="login-box-msg">Crie sua conta agora mesmo!</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-group mb-3">
            <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="{{ __('Nome') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user" style="font-size: 1.5em"></span>
                </div>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('E-Mail') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope" style="font-size: 1.5em"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Senha') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock" style="font-size: 1.5em"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirme a senha') }}">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock" style="font-size: 1.5em"></span>
                </div>
            </div>
            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-7 pt-2_7">
                <a href="{{ route('login') }}">Já tenho uma conta</a>
            </div>

            <div class="col-5">
                <button class="btn btn-lg btn-primary btn-block shadow" type="submit">Registrar</button>
            </div>
        </div>
    </form>
@endsection
