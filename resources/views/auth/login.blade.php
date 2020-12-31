@extends('layouts.app')

@section('content')
    <p class="login-box-msg">Faça seu login para começar sua sessão</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

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

        <div class="row">
            <div class="col-7">
                <a href="{{ url('password/reset') }}">Esqueci minha senha</a>
                <br>
                <a href="{{ route('register') }}">Criar minha conta</a>
            </div>

            <div class="col-5">
                <button class="btn btn-lg btn-primary btn-block shadow" type="submit">Entrar</button>
            </div>
        </div>
    </form>
@endsection
