@extends('admin.template.dashboard')
@section('contentAdmin')
    <div class="container">
            @if(Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-block" role="alert" style="top: 50%">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <strong>{{ Session::get('message') }}</strong>
                </div>
            @endif

        <div class="row my-3">
            <div class="col-md-6 text-start">
                <h4>Paper</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        Filter
                    </div>
                    <div class="card-body">
                        <form method="GET" action="/admin/dashboard/paper" id="formFilter">
                            {{-- @csrf --}}
                            <div class="row">
                                <div class="col-md-3">
                                        <select class="nice-select wide" name="year" id="year">
                                            <option value="" {{ $year == ""?'selected':'' }}>Year</option>
                                            <option value="2020" {{ $year == "2020"?'selected':'' }}>2020</option>
                                            <option value="2021" {{ $year == "2021"?'selected':'' }}>2021</option>
                                            <option value="2022" {{ $year == "2022"?'selected':'' }}>2022</option>
                                            <option value="2023" {{ $year == "2023"?'selected':'' }}>2023</option>
                                        </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="nice-select wide" name="abstract_status" id="abstract_status">
                                        <option value="" data-display="abstract_status" {{ $abstract_status == ""?'selected':'' }}>abstract_status</option>
                                        <option value="submitted" {{ $abstract_status == "submitted"?'selected':'' }}>submitted</option>
                                        <option value="under review" {{ $abstract_status == "under review"?'selected':'' }}>under review</option>
                                        <option value="accepted" {{ $abstract_status == "accepted"?'selected':'' }}>accepted</option>
                                        <option value="revision" {{ $abstract_status == "revision"?'selected':'' }}>revision</option>
                                        <option value="rejected" {{ $abstract_status == "rejected"?'selected':'' }}>rejected</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="nice-select wide" name="paper_status" id="paper_status">
                                        <option value="" data-display="paper_status" {{ $paper_status == ""?'selected':'' }}>paper_status</option>
                                        <option value="submitted" {{ $paper_status == "submitted"?'selected':'' }}>submitted</option>
                                        <option value="under review" {{ $paper_status == "under review"?'selected':'' }}>under review</option>
                                        <option value="accepted" {{ $paper_status == "accepted"?'selected':'' }}>accepted</option>
                                        <option value="revision" {{ $abstract_status == "revision"?'selected':'' }}>revision</option>
                                        <option value="rejected" {{ $abstract_status == "rejected"?'selected':'' }}>rejected</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="searchPaper" name="searchPaper" placeholder="Search .." value="{{ $searchPaper }}" onfocus="var value = this.value; this.value = null; this.value = value;">
                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-striped w-auto text-small small mw-100">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col" >Team Leader email</th>
                            <th class="text-center align-middle" scope="col" >Team</th>
                            <th class="text-center align-middle" scope="col" >Title</th>
                            <th class="text-center align-middle" scope="col" >Keywords</th>
                            <th class="text-center align-middle" scope="col" >Abstract</th>
                            <th class="text-center align-middle" scope="col" >Fullpaper</th>
                            <th class="text-center align-middle" scope="col" >PowerPoint</th>
                            <th class="text-center align-middle" scope="col" >Proof of payment</th>
                            <th class="text-center align-middle" scope="col" >payment Status</th>
                            <th class="text-center align-middle" scope="col" >abstract status</th>
                            <th class="text-center align-middle" scope="col" >paper status</th>
                            <th class="text-center align-middle" scope="col" >conference</th>
                            <th class="text-center align-middle" scope="col" >validation</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($paper as $paper)
                        <tr>
                            <td>
                                <p>{{$paper->email}}
                            </td>
                            <td>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapse-{{$paper->id}}" role="button" aria-expanded="false" aria-controls="collapse-{{$paper->id}}">
                                    click to see team detail
                                </a>
                                <div class="collapse" id="collapse-{{$paper->id}}">
                                    <div class="card card-body">
                                        <table class="table table-bordered table-striped w-auto">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle" scope="col" >Name</th>
                                                    <th class="text-center align-middle" scope="col" >University</th>
                                                    <th class="text-center align-middle" scope="col" >Address</th>
                                                    <th class="text-center align-middle" scope="col" >Country</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><p class="bg-primary text-white"><b>{{$paper->name}} (team leader)</b></p></td>
                                                    <td><p class="bg-primary text-white"><b>{{$paper->university}}</b></p></td>
                                                    <td><p class="bg-primary text-white"><b>{{$paper->address}},{{$paper->city}}</b></p></td>
                                                    <td><p class="bg-primary text-white"><b>{{$paper->country}}</b></p></td>
                                                </tr>
                                                @foreach ($paper->team as $team)
                                                <tr>
                                                    <td>{{$team->name}}</td>
                                                    <td>{{$team->university}}</td>
                                                    <td>{{$team->address}}, {{$team->city}}</td>
                                                    <td>{{$team->country}}</td>
                                                </tr>

                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </td>
                            <td>{{$paper->paper->title}}</td>
                            <td>
                                @foreach($paper->paper->tags as $tag)
                                    <label class="badge bg-info">{{ $tag->name }}</label>
                                @endforeach
                            </td>
                            <td>
                                @if ($paper->paper->abstract != NULL)
                                    {{-- <a href="{{ url($paper->paper->abstract) }}" target="blank"><img width="150px" src="{{ url($paper->paper->abstract) }}"></a>
                                    <a href="{{url($paper->paper->abstract)}}">download</a> --}}
                                    <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="{{url($paper->paper->abstract)}}">
                                        @php
                                            $abstract = explode('/',$paper->paper->abstract);
                                            echo $abstract[2];
                                        @endphp
                                        {{-- {{$paper->paper->abstract}} --}}
                                </button>
                                @endif
                            </td>
                            <td>
                                @if ($paper->paper->fullpaper != null)
                                    <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="{{url($paper->paper->fullpaper)}}">
                                        @php
                                            $fullpaper = explode('/',$paper->paper->fullpaper);
                                            echo $fullpaper[2];
                                        @endphp
                                    </button>
                                @else
                                    <p>no file uploaded yet</p>
                                @endif
                            </td>
                            <td>
                                @if ($paper->paper->powerpoint != null)
                                <button type="button " class="button-link" data-bs-toggle="modal" data-bs-target="#openPDFModal" data-bs-pdf="{{url($paper->paper->powerpoint)}}">
                                    @php
                                        $ppt = explode('/',$paper->paper->powerpoint);
                                        echo $ppt[2];
                                    @endphp
                                </button>
                                @else
                                    <p>no file uploaded yet</p>
                                @endif
                            </td>
                            <td>
                                @if ($paper->paper->payment != NULL)
                                    <a href="{{ url($paper->paper->payment) }}" target="blank"><img width="150px" src="{{ url($paper->paper->payment) }}"></a>
                                @else
                                    <p>no file uploaded yet</p>
                                @endif
                            </td>
                            <td>
                                <p>{{$paper->paper->payment_status}}</p>
                            </td>
                            <td class="text-center">
                                <p class=" fw-bold @if($paper->paper->abstract_status === 'accepted')
                                    accepted
                                    @elseif($paper->paper->abstract_status ==='revision')
                                    revision
                                    @elseif($paper->paper->abstract_status ==='rejected')
                                    rejected
                                    @elseif ($paper->paper->abstract_status==='under review')
                                    under-review
                                    @endif">{{$paper->paper->abstract_status}}</p>
                            </td>
                            <td class="text-center">
                                <p class=" fw-bold @if($paper->paper->paper_status === 'accepted')
                                    accepted
                                    @elseif($paper->paper->abstract_status ==='revision')
                                    revision
                                    @elseif($paper->paper->paper_status ==='rejected')
                                    rejected
                                    @elseif ($paper->paper->paper_status==='under review')
                                    under-review
                                    @endif">{{$paper->paper->paper_status}}
                                </p>
                            </td>
                            <td class="'text-center">
                                @foreach($paper->webinar as $conference)
                                <p>{{$conference->start_date}}</p>
                                @endforeach
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#validation" data-bs-id="{{$paper->paper->id}}" data-bs-name="{{$paper->name}}" data-bs-payment="{{$paper->paper->payment_status}}" data-bs-abstract-status="{{$paper->paper->abstract_status}}" data-bs-paper-status="{{$paper->paper->paper_status}}">Validation</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal view pdf --}}
    <div class="modal fade" id="openPDFModal" tabindex="-1" aria-labelledby="openPDFModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header d-none">
                    <h5 class="modal-title" id="openPDFModalLabel"></h5>
                    {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                </div>
                <div class="modal-body">
                    <iframe id="pdf" src="" frameBorder="0" scrolling="no" style="height: 90vh" width="100%">
                    </iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    {{-- end modal view pdf --}}

    {{-- modal validation --}}
    <div class="modal fade" id="validation" tabindex="-1" aria-labelledby="validation" aria-hidden="true">
        <div class="modal-dialog">
            <form name="modal_validation" id="modal_validation" action="/admin/validation" method="post">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Validation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id"  value="">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="payment_status">Payment Status</label>
                            <select class="nice-select wide" name="payment_status">
                                <option value="unpaid">Unpaid</option>
                                <option value="paid">Paid</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="abstract-status">Abstract Status</label>
                            <select class="nice-select wide" name="abstract_status">
                                <option value="submitted">Submitted</option>
                                <option value="under review">Under review</option>
                                <option value="accepted">Accepted</option>
                                <option value="revision">Revision</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="paper-status">Paper Status</label>
                            <select class="nice-select wide" name="paper_status">
                                <option value="submitted">Submitted</option>
                                <option value="under review">Under review</option>
                                <option value="accepted">Accepted</option>
                                <option value="revision">Revision</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- end modal validation --}}

<script>
    window.onload = function(){
        document.getElementById('searchPaper').focus();
    }
    var select = document.getElementById('year');
    select.onchange = function(){
        this.form.submit();
    };
    var select = document.getElementById('abstract_status');
    select.onchange = function(){
        this.form.submit();
    };
    var select = document.getElementById('paper_status');
    select.onchange = function(){
        this.form.submit();
    };
    // var searchPaper = document.getElementById('searchPaper');
    // searchPaper.addEventListener("keyup", function() {
    //     this.form.submit();
    // })
    var searchPaper = document.getElementById('searchPaper');
    var timeout = null;
    var formFilter = document.getElementById('formFilter');

    searchPaper.addEventListener("keyup", function (e) {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            formFilter.submit();
        }, 1000);
    });

    var openPDFModal = document.getElementById('openPDFModal')
    openPDFModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget

        var recipient = button.getAttribute('data-bs-pdf')

        var modalTitle = openPDFModal.querySelector('.modal-title')
        var modalBodyIframe = openPDFModal.querySelector('.modal-body iframe')

        modalTitle.textContent = 'https://drive.google.com/viewerng/viewer?embedded=true&url=' + recipient + '#toolbar=0&scrollbar=0'
        modalBodyIframe.src = recipient
    })

    var validationModal = document.getElementById('validation')
        validationModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        var payment = button.getAttribute('data-bs-payment')
        var abstractStatus = button.getAttribute('data-bs-abstract-status')
        var paperStatus = button.getAttribute('data-bs-paper-status')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var inputId = validationModal.querySelector('.modal-body input[name="id"]')
        inputId.value = id
        var inputName = validationModal.querySelector('.modal-body input[name="name"]')
        inputName.value = name
        var inputPayment = validationModal.querySelector('.modal-body select[name="payment_status"]')
        inputPayment.value = payment
        var inputPayment2 = validationModal.querySelectorAll('.modal span.current')[0]
        inputPayment2.innerHTML = payment
        var inputAbstractStatus = validationModal.querySelector('.modal-body select[name="abstract_status"]')
        inputAbstractStatus.value = abstractStatus
        var inputAbstractStatus2 = validationModal.querySelectorAll('.modal span.current')[1]
        inputAbstractStatus2.innerHTML = abstractStatus
        var inputPaperStatus = validationModal.querySelector('.modal-body select[name="paper_status"]')
        inputPaperStatus.value = paperStatus
        var inputPaperStatus2 = validationModal.querySelectorAll('.modal span.current')[2]
        inputPaperStatus2.innerHTML = paperStatus
    })

</script>

@endsection
