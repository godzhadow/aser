@extends('fullpaper.template.dashboard')
@section('contentFullpaper')
@push('links')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endpush
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                {!! $calendar->calendar() !!}
            </div>
        </div>
    </div>

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endpush
@endsection

