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
                            <li><a href="{{ url('/') }}">Home - </a></li>
                            <li><a href="#">&nbsp Our Schedule</a></li>
                        </ul>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-start">
                <div class="form-group">
                    <button class="btn btn-outline-primary">Pra Event</button>
                    <button class="btn btn-outline-primary">Main Event/International Conference</button>
                </div>
            </div>
            <div class="col-md-6 text-end">
                <div class="form-group">
                    <label><b>SELECT DATE</b></label>
                    <select class="nice-select right">
                        <option>January</option>
                        <option>February</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Today</h4>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <h5><b>Title</b></h5>
                        <p>lorem ipsum dolor sit amet</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
