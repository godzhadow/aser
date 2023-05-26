@extends('fullpaper.template.dashboard')
@section('contentFullpaper')
    <div class="container">
        {{-- @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif --}}
        <div class="row">
            @foreach ($webinar as $w)
            <div class="col-lg-6 col-md-6 col-sm-6 shadow">
                <div class="z-blogs mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                    <div class="z-blogs__thumb mb-30">
                    <a href="blog-details.html"><img src="{{asset('/img/logo_aser.png')}}" alt="blog-img"></a>
                    </div>
                    <div class="z-blogs__content">
                        <h5 class="mb-25">Online . School . Skill</h5>
                        <h4 class="sub-title mb-15"><a href="blog-details.html">5 Ways to Use Padlet in Higher -Ed Online Classroom</a></h4>
                        <div class="z-blogs__meta d-sm-flex justify-content-between pt-20 pb-20">
                            <span>Date : {{date("d-m-Y", strtotime($w->start_date))}}<br>Time : {{date("H:i:s", strtotime($w->start_date))}}</span>
                            <span>By {{$w->user->name}}</span>
                        </div>
                        <div class="col-md-12 text-center">
                            <button class="btn btn-success text-center">enter conference</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
