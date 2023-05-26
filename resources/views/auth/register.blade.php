@extends('layouts.base')

@section('content')
<section class="contact-form-area pt-130 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row mb-10">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Correspondent Author') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="enter your name here as lead Author" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-10">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail Corespondence Author') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="enter your email here as lead Author" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{-- <div class="form-group row mb-10">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nim') }}</label>

                                <div class="col-md-6">
                                    <input id="nim" type="text" class="form-control{{ $errors->has('nim') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}" required autofocus>

                                    @if ($errors->has('nim'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nim') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}

                            {{-- <div class="form-group row mb-10">
                                <label for="university" class="col-md-4 col-form-label text-md-right">{{ __('University/institution') }}</label>

                                <div class="col-md-6">
                                    <input id="university" type="text" class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}" name="university" value="{{ old('university') }}" required autofocus>

                                    @if ($errors->has('university'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('university') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}

                            {{-- <div class="form-group row mb-10">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <input id="nim" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="nim" value="{{ old('nim') }}" required autofocus>

                                    @if ($errors->has('nim'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nim') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="form-group row mb-10">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-10">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <input id="jenis-user" type="hidden" class="form-control" name="jenis_user" value="{{ request('ref') }}">


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
