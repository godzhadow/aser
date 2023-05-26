@extends('fullpaper.template.dashboard')
@section('contentFullpaper')
    <div class="container">
        {{-- @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif --}}

        <div class="row justify-content-center message-content-user">
            <div class="col-md-8 bg-light">
                @foreach ($user->message as $m)
                <div class="row mb-3">
                    <div class="col">
                        <div class="chat-bubble chat-bubble--right mb-0">
                            <p class="text-white">{{$m->message}}</p>
                            <p class="small text-white text-end">by : {{$m->sender}}</p>
                        </div>
                        <div class="row mt-0">
                            <div class="col">
                                <p class="small text-end mt-0 me-4">{{$m->created_at}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
