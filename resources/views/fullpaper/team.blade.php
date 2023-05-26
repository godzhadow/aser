@extends('fullpaper.template.dashboard')
@section('contentFullpaper')
    <div class="container">
        {{-- @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif --}}

        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="row my-3">
                        <div class="col-md-12 text-start">
                            <h4>My Team</h4>
                        </div>
                        {{-- <div class="col-md-6 text-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeam">
                            <i class="fa fa-plus"> Add Team's Member</i>
                            </button>
                        </div> --}}
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>University</th>
                                <th>Country</th>
                                <th>address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>{{$user->name}}</b></td>
                                <td><b>{{$user->university}}</b></td>
                                <td><b>{{$user->country}}</b></td>
                                <td><b>{{$user->address}},{{$user->city}}</b></td>
                                <td>
                                    <button type="button" class="btn btn-primary" disabled><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger" disabled><i class="fa fa-trash"></i></button>
                            </tr>
                            @foreach($user->team as $t)
                            <tr>
                                {{-- <td>{{$loop->iteration}}</td> --}}
                                <td>{{$t->name}}</td>
                                <td>{{$t->university}}</td>
                                <td>{{$t->country}}</td>
                                <td>{{$t->address}},{{$t->city}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTeam" data-bs-id="{{$t->id}}" data-bs-name="{{$t->name}}" data-bs-university="{{$t->university}}" data-bs-country="{{$t->country}}" data-bs-address="{{$t->address}}" data-bs-city="{{$t->city}}"><i class="fa fa-pencil"></i></button>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="/fullpaper/deleteteam/{{ $t->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row my-3">
                        <div class="col-md-12 text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeam">
                            <i class="fa fa-plus"> Add Team's Member</i>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-50">
                        <div class="col-md-12 text-end">
                            <a href="{{ url('/fullpaper/dashboard/paper') }}" class="btn btn-primary col-md-6 p-3">
                                Next Step <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal add Team --}}
    <div class="modal fade" id="addTeam" tabindex="-1" aria-labelledby="addTeamLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/fullpaper/addteam" method="post">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTeamLabel">Add team’s credentials</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="name" required>
                            <div class="form-text">enter name here for @if ($user->team->count() < 1) second
                            @elseif( $user->team->count()==1) third
                            @elseif ($user->team->count()==2) fourth
                            @elseif ($user->team->count()==3) fifth
                            @elseif ($user->team->count()==4) sixth
                            @else seven
                            @endif Author.</div>

                        </div>
                        <div class="form-group mb-3">
                            <label for="university">University</label>
                            <input type="text" class="form-control" name="university" placeholder="university" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status" class="form-label">Country</label>
                                <select class="nice-select wide" name="country" required>
                                    <option selected disabled>country</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Philipine">Philipine</option>
                                </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="address" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" placeholder="city" required>
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
    {{-- end modal add team --}}
    <!-- Modal edit team -->
    <div class="modal fade" id="editTeam" tabindex="-1" aria-labelledby="editTeam" aria-hidden="true">
        <div class="modal-dialog">
            <form name="modal_edit_team" id="modal_edit_team" action="/fullpaper/updateteam" method="post">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Team</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="university">University</label>
                            <input type="text" class="form-control" name="university" placeholder="university" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="country" class="form-label">Country</label>
                                <select class="nice-select wide" name="country" required>
                                    <option selected disabled>country</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="Philipine">Philipine</option>
                                </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="address" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" placeholder="city" required>
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
<script>
    // window.onload = function(){
    //     document.getElementById('searchUser').focus();

    // }


    // var searchUser = document.getElementById('searchUser');
    // var timeout = null;
    // var formSearchUser = document.getElementById('formSearchUser');

    // searchUser.addEventListener("keyup", function (e) {
    //     clearTimeout(timeout);
    //     timeout = setTimeout(function () {
    //         formSearchUser.submit();
    //     }, 1000);
    // });

    // parsing data to edit team modal
    var editTeamModal = document.getElementById('editTeam')
        editTeamModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-bs-id')
        var name = button.getAttribute('data-bs-name')
        var university = button.getAttribute('data-bs-university')
        var country = button.getAttribute('data-bs-country')
        var address = button.getAttribute('data-bs-address')
        var city = button.getAttribute('data-bs-city')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var inputId = editTeamModal.querySelector('.modal-body input[name="id"]')
        inputId.value = id
        var inputName = editTeamModal.querySelector('.modal-body input[name="name"]')
        inputName.value = name
        var inputUniversity = editTeamModal.querySelector('.modal-body input[name="university"]')
        inputUniversity.value = university
        var inputCountry = editTeamModal.querySelector('.modal-body select[name="country"]')
        inputCountry.value = country
        var inputCountry2 = editTeamModal.querySelectorAll('.modal span.current')[0]
        inputCountry2.innerHTML = country
        var inputAddress = editTeamModal.querySelector('.modal-body input[name="address"]')
        inputAddress.value = address
        var inputCity = editTeamModal.querySelector('.modal-body input[name="city"]')
        inputCity.value = city
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
    // end parsing data
</script>
@endsection
