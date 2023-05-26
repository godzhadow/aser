@extends('admin.template.dashboard')
@section('contentAdmin')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row bg-light">
                        <div class="col-md-3 ps-0 pe-0 message-contact">
                            <div class="nav flex-column nav-pills" id="message-pills-tab" role="tablist" aria-orientation="vertical">
                                @foreach ($paperuser as $index => $ps)
                                <button class="nav-link {{$index == 0 ? 'active':''}} paddingleft" id="message-pills-tab-{{$ps->id}}" data-bs-toggle="pill" data-bs-target="#v-pills-user-{{$ps->id}}" type="button" role="tab" aria-controls="v-pills-user-{{$ps->id}}" aria-selected="true">{{$ps->name}}</button>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-9 border-start">
                            <div class="tab-content w-100" id="message-pills-tabContent">
                                @foreach ($paperuser as $index => $ps)
                                <div class="tab-pane fade {{$index==0 ? 'show active':''}}" id="v-pills-user-{{$ps->id}}" role="tabpanel" aria-labelledby="v-pills-user-tab">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row message-content">
                                                <div class="col">
                                                    @foreach ($ps->message as $m)
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
                                            <div class="row message-input">
                                                <div class="col">
                                                    <form action="/admin/sendmessage" method="post">
                                                        {{ csrf_field() }}
                                                        <div class="input-group mb-3">
                                                            <input type="hidden" name="id" value="{{$ps->id}}">
                                                            <input type="text" class="form-control" placeholder="send message" aria-label="send message" aria-describedby="button-addon2" name="message">
                                                            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
