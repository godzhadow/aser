@extends('admin.template.dashboard')
@section('contentAdmin')
<section class="pt-150 pb-120 pt-md-100 pt-xs-100 pb-md-70 pb-xs-70">
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in as <b>Admin!</b>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link {{$tab==0?'active':''}}" id="v-pills-user-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user" type="button" role="tab" aria-controls="v-pills-user" aria-selected="true"><i class="fa fa-user"></i> User</button>
                <button class="nav-link {{$tab==1?'active':''}}" id="v-pills-paper-tab" data-bs-toggle="pill" data-bs-target="#v-pills-paper" type="button" role="tab" aria-controls="v-pills-paper" aria-selected="false"><i class="fa fa-star"></i> paper</button>
                <button class="nav-link {{$tab==2?'active':''}}" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false"><i class="fa fa-envelope"></i> Messages</button>
                <button class="nav-link {{$tab==3?'active':''}}" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false" disabled><i class="fa fa-cog"></i> Settings</button>
                <button class="nav-link {{$tab==4?'active':''}}" id="v-pills-webinar-tab" data-bs-toggle="pill" data-bs-target="#v-pills-webinar" type="button" role="tab" aria-controls="v-pills-webinar" aria-selected="false"><i class="fa fa-users"></i> Webinar/Conference</button>
            </div>
            <div class="tab-content w-100" id="v-pills-tabContent">
                <div class="tab-pane fade {{$tab==0?'show active':''}}" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="row mt-3 mb-3">
                                    <div class="col">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                            <i class="fa fa-plus"></i> Add new User
                                        </button>
                                    </div>
                                    <div class="col text-end">
                                        {{-- <form action="/admin/users/search" method="GET"> --}}
                                        <form action="/admin/dashboard" method="GET" id="formSearchUser">
                                            <div class="input-group mb-3">
                                                <input type="text" name="searchUser" id="searchUser" placeholder="Search .." value="{{ $searchUser }}" onfocus="var value = this.value; this.value = null; this.value = value;">
                                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($user as $p)
                                                <tr>
                                                    <th scope="row">{{ $p->id }}</th>
                                                    <td>{{ $p->name }}</td>
                                                    <td>{{ $p->email }}</td>
                                                    <td>{{ $p->jenis_user }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editUser" data-bs-id="{{$p->id}}" data-bs-name="{{$p->name}}" data-bs-email="{{$p->email}}" data-bs-role="{{$p->jenis_user}}" data-bs-picture="{{asset($p->picture)}}"><i class="fa fa-pencil"></i></button>
                                                        <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="/admin/deleteuser/{{ $p->id }}"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>

                                        <br/>
                                        {{-- Halaman : {{ $user->currentPage() }} <br/>
                                        Jumlah Data : {{ $user->total() }} <br/>
                                        Data Per Halaman : {{ $user->perPage() }} <br/> --}}


                                        {{ $user->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{$tab==1?'show active':''}}" id="v-pills-paper" role="tabpanel" aria-labelledby="v-pills-paper-tab">
                    <div class="card-body">
                        <div class="row my-3">
                            <div class="col-md-6 text-start">
                                <h4>Paper</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped w-auto">
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
                </div>
                <div class="tab-pane fade {{$tab==2?'show active':''}} justify-content-center" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="row bg-light">
                                    <div class="col-md-5 message-contact">
                                        <div class="nav flex-column nav-pills me-3" id="message-pills-tab" role="tablist" aria-orientation="vertical">
                                            @foreach ($paperuser as $index => $ps)
                                            <button class="nav-link {{$index == 0 ? 'active':''}}" id="message-pills-tab-{{$ps->id}}" data-bs-toggle="pill" data-bs-target="#v-pills-user-{{$ps->id}}" type="button" role="tab" aria-controls="v-pills-user-{{$ps->id}}" aria-selected="true">{{$ps->name}}</button>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-md-7">
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
                <div class="tab-pane fade {{$tab==3?'show active':''}}" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">4</div>
                <div class="tab-pane fade {{$tab==4?'show active':''}}" id="v-pills-webinar" role="tabpanel" aria-labelledby="v-pills-webinar-tab">5</div>
            </div>
        </div>
    </div>
</section>

{{-- modal add new user --}}
<div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="/admin/users/store" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTeamLabel">Add User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">User Role</label>
                        <select class="nice-select wide" name="role">
                            <option value="admin">Admin</option>
                            <option value="reviewer">Reviewer</option>
                            <option value="full paper">Full Paper</option>
                            <option value="non-full paper">Non Full Paper</option>
                            <option value="discussant">Discussant</option>
                            <option value="session head">Session Head</option>
                            <option value="opening speech">Opening Speech</option>
                            <option value="speaker workshop"> Speaker Workshop</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{-- <label>Photo profile (optional)</label> --}}
                        <input type="file" class="dropifyprofile" name="photo_profile" data-allowed-file-extensions="png jpg pdf jpeg" data-max-file-size="10240K" data-default-file="http://localhost:8000/uploads/profile/37.png">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- end add new user --}}

{{-- modal edit user --}}
<div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUser" aria-hidden="true">
    <div class="modal-dialog">
        <form name="modal_edit_user" id="modal_edit_user" action="/admin/edituser" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control text-uppercase" name="name" id="name" placeholder="name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="role">User Role</label>
                        <select class="nice-select wide" id="role" name="role">
                            <option value="admin">Admin</option>
                            <option value="reviewer">Reviewer</option>
                            <option value="full paper">Full Paper</option>
                            <option value="non-full paper">Non Full Paper</option>
                            <option value="discussant">Discussant</option>
                            <option value="session head">Session Head</option>
                            <option value="opening speech">Opening Speech</option>
                            <option value="speaker workshop"> Speaker Workshop</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{-- <label>Photo profile (optional)</label> --}}
                        <input type="file" class="dropifyprofile" name="photo_profile" data-allowed-file-extensions="png jpg pdf jpeg" data-max-file-size="10240K">
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
{{-- end modal edit user --}}

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
        document.getElementById('searchUser').focus();
    }
    // var search = document.getElementById('search');
    // search.addEventListener("keyup", function() {
    //     this.form.submit();
    // })
    var searchUser = document.getElementById('searchUser');
    var timeout = null;
    var formSearchUser = document.getElementById('formSearchUser');

    searchUser.addEventListener("keyup", function (e) {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            formSearchUser.submit();
        }, 1000);
    });

    var editUserModal = document.getElementById('editUser')
    editUserModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        var email = button.getAttribute('data-bs-email')
        var role = button.getAttribute('data-bs-role')
        var profile = button.getAttribute('data-bs-picture')
        console.log(profile)
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var inputId = editUserModal.querySelector('.modal-body input[name="id"]')
        inputId.value = id
        var inputName = editUserModal.querySelector('.modal-body input[name="name"]')
        inputName.value = name
        var inputEmail = editUserModal.querySelector('.modal-body input[name="email"]')
        inputEmail.value = email
        var inputRole = editUserModal.querySelector('.modal-body select[name="role"]')
        inputRole.value = role
        var inputRole2 = editUserModal.querySelectorAll('.modal span.current')[0]
        inputRole2.innerHTML = role

        var inputPicture = editUserModal.querySelector('.modal-body input[name="photo_profile"]')
        // inputPicture.setAttribute("data-default-file", profile);
        var drEvent = $(inputPicture).dropify();
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        drEvent.settings.defaultFile = profile;
        drEvent.destroy();
        drEvent.init();
        $(inputPicture).dropify({
        defaultFile: profile,
        });
    })

    var editUserModal = document.getElementById('editUser')
    editUserModal.addEventListener('hidden.bs.modal', function (event) {
        var inputPicture = editUserModal.querySelector('.modal-body input[name="photo_profile"]')
        console.log('close', inputPicture)
        var drEvent = $(inputPicture).dropify();
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();

    })

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
