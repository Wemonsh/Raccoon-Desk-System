@extends('layouts.bg')

@section('content')

    <div class="container">
        <div class="card card-login mx-auto mt-5">
            <div class="card-header">{{ __('auth/login.login') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email address" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="inputEmail">{{ __('auth/login.email') }}</label>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>
                            <label for="inputPassword">{{ __('auth/login.password') }}</label>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('auth/login.remember_me') }}
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('auth/login.login') }}
                    </button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="register.html">{{ __('auth/login.register_account') }}</a>

                    @if (Route::has('password.request'))
                        <a class="d-block small" href="{{ route('password.request') }}">
                            {{ __('auth/login.forgot_password') }}
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
