@extends('layouts.base')

@section('content')
<section class="contact-form-area pt-130 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <section class="page-title-area d-flex align-items-end mb-40" style="background-image: url(img/login/breadcrumb.png);heigh:100px">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-12">
                    <div class="page-title-wrapper mb-50">
                    <h1 class="page-title mb-25">Login</h1>
                    <div class="breadcrumb-list">
                        <ul class="breadcrumb">
                            <li><a href="index.html">Home - </a></li>
                            <li><a href="#"> Login</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center mb-5">LOGIN</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group mb-3 text-center">
                        <div class="input-group-prepend">
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail Address" aria-label="email" aria-describedby="basic-addon1" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3 text-center">
                        <input id="password" type="password" class="form-control input-pass{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                        <div class="input-group-prepend">
                            <a class="input-group-text password-icon" onclick="toggleShow()">
                                <i id="iconeye" class="fa fa-eye-slash"></i>
                            </a>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group row clearfix">
                        <div class="col-md-6 float-left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    <b>{{ __('Remember Me') }}</b>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link theme_text" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row mb-0 text-center">
                        <div class="col-md-12">
                            <button type="submit" name="login" class="btn global_btn col-2 mb-3">
                                {{ __('Login') }}
                            </button>
                            <p>Dont have account yet ?</p><p>please <b><a href="/preregister" class="register_link">register here</a></b></p>
                        </div>
                    </div>
                </form>
                {{-- <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>


                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
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

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<script>
function toggleShow() {
    var x = document.getElementById("password");
    var icon = document.getElementById("iconeye");
    if (x.type === "password") {
        x.type = "text";
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        x.type = "password";
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }

  }
</script>
@endsection
