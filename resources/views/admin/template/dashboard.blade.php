@extends('layouts.base')
@section('content')
<section class="pt-150 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <div class="container">
        <div class="row">
            <div class="col-md-2 ps-0 pe-0">
                <ul class="nav nav-pills d-block">
                    <li class="nav-item ps-0">
                        <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : ''}} paddingleft" aria-current="page" href="{{ url('/admin/dashboard') }}"><i class="fa fa-user"></i> Dashboard</a>
                    </li>
                    <li class="nav-item ps-0">
                        <a class="nav-link {{ Request::is('admin/dashboard/user') ? 'active' : ''}} paddingleft" aria-current="page" href="{{ url('/admin/dashboard/user') }}"><i class="fa fa-user"></i> User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard/paper') ? 'active' : ''}} paddingleft" href="{{ url('/admin/dashboard/paper') }}"><i class="fa fa-star"></i> paper</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard/webinar') ? 'active' : ''}} paddingleft" href="{{ url('/admin/dashboard/webinar') }}"><i class="fa fa-users"></i> Webinar/Conference</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('admin/dashboard/message') ? 'active' : ''}} paddingleft" href="{{ url('/admin/dashboard/message') }}"><i class="fa fa-envelope"></i> Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link paddingleft disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fa fa-cog"></i> Settings</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10 border-start ps-0 pe-0">
                @yield('contentAdmin')
            </div>
        </div>
    </div>
</section>

@endsection
