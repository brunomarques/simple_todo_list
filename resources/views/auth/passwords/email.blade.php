@extends('layouts.app')

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <p class="login-box-msg">Esqueceu a senha?</p>
    <p class="login-box-msg">Diga-nos quem é você para que possamos te enviar o link para troca da senha.</p>

    <form method="POST" action="{{ route('password.email') }}">
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

        <div class="row">
            <div class="col-12">
                <button class="btn btn-lg btn-primary bg-gradient-primary btn-block shadow" type="submit">Enviar link para troca da senha</button>
            </div>
        </div>
    </form>

    <p class="mt-4">
        <a href="{{ route('login') }}">Lembrei minha senha!</a>
    </p>
@endsection
