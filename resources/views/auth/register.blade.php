@extends('layouts.bg')

@section('content')
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Register an Account</div>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-label-group">
                                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required>
                                    <label for="last_name">Last name</label>
                                    @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-label-group">
                                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required>
                                    <label for="first_name">First name</label>
                                    @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-label-group">
                                    <input id="middle_name" type="text" class="form-control{{ $errors->has('middle_name') ? ' is-invalid' : '' }}" name="middle_name" value="{{ old('middle_name') }}" required>
                                    <label for="middle_name">Middle name</label>
                                    @if ($errors->has('middle_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middle_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="gender">Gender</label>
                                <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required>
                                    <option>1</option>
                                </select>

                                @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="date_birth">Date Birth</label>
                                <input id="date_birth" type="date" class="form-control{{ $errors->has('date_birth') ? ' is-invalid' : '' }}" name="date_birth" value="{{ old('date_birth') }}" required>

                                @if ($errors->has('date_birth'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('date_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>
                            <label for="phone">Phone</label>

                            @if ($errors->has('phone'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo">
                            <label class="custom-file-label" for="photo" data-browse="{{ __('auth/register.browse') }}">{{ __('auth/register.select_file') }}</label>
                        </div>

                        @if ($errors->has('photo'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                        @endif
                    </div>

                    <hr>

                    <div class="form-group">
                        <select class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" id="department" name="department" required>
                            <option>1</option>
                        </select>

                        @if ($errors->has('department'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('department') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <select class="form-control{{ $errors->has('division') ? ' is-invalid' : '' }}" id="division" name="division" required>
                            <option>1</option>
                        </select>

                        @if ($errors->has('division'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('division') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <select class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" id="position" name="position" required>
                            <option>1</option>
                        </select>

                        @if ($errors->has('position'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('position') }}</strong>
                        </span>
                        @endif
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="form-label-group">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                            <label for="email">Email address</label>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    <label for="password">Password</label>
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-label-group">
                                    <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>
                                    <label for="password_confirm">Confirm password</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">
                        Register
                    </button>
                </form>
                <div class="text-center">
                    <a class="d-block small mt-3" href="login.html">Login Page</a>
                    <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
@endsection
