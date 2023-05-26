@extends('admin.template.dashboard')
@section('contentAdmin')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif

        <div class="row justify-content-center mt-5">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ url('/addabstract') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row justify-content-center mb-3">
                                <label for="title" class="col-md-3 col-form-label">{{ __('title') }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }} text-uppercase" name="title" value="{{ old('title') }}" aria-describedby="titleHelp" required autofocus>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label for="authors" class="col-md-3 col-form-label">{{ __('authors') }}</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control{{ $errors->has('authors') ? ' is-invalid' : '' }}" name="authors" value="{{ old('authors') }}" aria-describedby="authorsHelp" required autofocus>
                                    @if ($errors->has('authors'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('authors') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Abstract Submission</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Presentation Submission</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Paper Submission</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row justify-content-center mb-3">
                                <label class="col-form-label">Conference Schedule</label>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="start_date" class="col-md-3 col-form-label">Start Date</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" aria-describedby="yearHelp" required autofocus>
                                            @if ($errors->has('year'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
