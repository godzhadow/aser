@extends('admin.template.dashboard')
@section('contentAdmin')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert {{ Session::get('alert-class', 'alert-info') }} alert-dismissible alert-block" role="alert" style="top: 50%">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif
        <div class="row mt-3 mb-3">
            <div class="col-md-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addwebinar">
                    <i class="fa fa-plus"></i> Add new Webinar
                </button>
            </div>
            <div class="col-md-8 text-end">
                <form action="/admin/dashboard/webinar" method="GET" id="formSearchWebinar">
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
                            <select class="nice-select wide" name="type" id="type">
                                <option value="" data-display="type" {{ $type == ""?'selected':'' }}>type</option>
                                <option value="webinar" {{ $type == "webinar"?'selected':'' }}>webinar</option>
                                <option value="conference" {{ $type == "conference"?'selected':'' }}>conference</option>
                            </select>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="searchWebinar" name="searchWebinar" placeholder="Search .." value="{{ $searchWebinar }}" onfocus="var value = this.value; this.value = null; this.value = value;">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-sm table-bordered table-striped w-auto text-small small mw-100">
                    <thead>
                        <tr>
                            <th class="text-center align-middle" scope="col" >Title</th>
                            <th class="text-center align-middle" scope="col" >speaker</th>
                            <th class="text-center align-middle" scope="col" >Date time</th>
                            <th class="text-center align-middle" scope="col" >price</th>
                            <th class="text-center align-middle" scope="col" >link</th>
                            <th class="text-center align-middle" scope="col" >Type</th>
                            <th class="text-center align-middle" scope="col" >Picture</th>
                            <th class="text-center align-middle" scope="col" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($webinar as $w)
                            <tr>
                                <td>{{$w->title}}</td>
                                <td>{{$w->user->name}}</td>
                                <td>{{$w->start_date}}</td>
                                <td>{{$w->price}}</td>
                                <td>{{$w->link}}</td>
                                <td>{{$w->type}}</td>
                                <td>@if ($w->image != NULL)
                                        <a href="{{ url($w->image) }}" target="blank"><img width="150px" src="{{ url($w->image) }}"></a>
                                    @else
                                        <p>no image</p>
                                    @endif</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editWebinar" data-bs-id="{{$w->id}}" data-bs-title="{{$w->title}}" data-bs-speaker="{{$w->user->name}}" data-bs-datetime="{{$w->start_date}}" data-bs-price="{{$w->price}}" data-bs-link="{{$w->link}}" data-bs-picture="{{asset($w->image)}}"><i class="fa fa-pencil"></i></button>
                                    <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')" href="/admin/deletewebinar/{{ $w->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal add new webinar --}}
    <div class="modal fade" id="addwebinar" tabindex="-1" aria-labelledby="addwebinarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="/admin/webinar/store" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTeamLabel">Add webinar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control text-uppercase" name="title" placeholder="title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="speaker">Speaker</label>
                            <select class="nice-select wide" name="speaker">
                                <option value="" data-display="Speaker" selected>Speaker</option>
                                @foreach($speaker as $speakers)
                                    <option value="{{$speakers->id}}">{{$speakers->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="datetime">Date & Time</label>
                            <input type="datetime-local" class="form-control" name="datetime" placeholder="datetime" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="price" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" placeholder="link" required>
                        </div>
                        <div class="form-group">
                            {{-- <label>Photo profile (optional)</label> --}}
                            <input type="file" class="dropifywebinaradd" name="photo_webinar_add" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="10240K">
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
    {{-- end add new webinar --}}
    {{-- modal edit webinar --}}
    <div class="modal fade" id="editWebinar" tabindex="-1" aria-labelledby="editwebinar" aria-hidden="true">
        <div class="modal-dialog">
            <form name="modal_edit_webinar" id="modal_edit_webinar" action="/admin/editwebinar" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit webinar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group mb-3">
                            <label for="title">Title</label>
                            <input type="text" class="form-control text-uppercase" name="title" id="title" placeholder="title" required disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="speaker">Speaker</label>
                            <input type="text" class="form-control" name="speaker" id="speaker" placeholder="speaker" required disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="datetime">Date time</label>
                            <input type="datetime-local" class="form-control" name="datetime" id="datetime" placeholder="datetime" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" name="price" id="price" placeholder="price">
                        </div>
                        <div class="form-group mb-3">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="link" required>
                        </div>
                        <div class="form-group">
                            {{-- <label>Photo webinar (optional)</label> --}}
                            <input type="file" class="dropifywebinar" name="photo_webinar" data-allowed-file-extensions="png jpg jpeg" data-max-file-size="10240K">
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
    {{-- end modal edit webinar --}}
    <script>
        window.onload = function(){
        document.getElementById('searchWebinar').focus();
        }
        var select = document.getElementById('year');
        select.onchange = function(){
            this.form.submit();
        };
        var select = document.getElementById('type');
        select.onchange = function(){
            this.form.submit();
        };

        var searchWebinar = document.getElementById('searchWebinar');
        var timeout = null;
        var formsearchWebinar = document.getElementById('formsearchWebinar');

        searchWebinar.addEventListener("keyup", function (e) {
            clearTimeout(timeout);
            timeout = setTimeout(function () {
                formsearchWebinar.submit();
            }, 1000);
        });

        // edit webinar model
        var editWebinarModal = document.getElementById('editWebinar')
        editWebinarModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var id = button.getAttribute('data-bs-id')
            var title = button.getAttribute('data-bs-title')
            var speaker = button.getAttribute('data-bs-speaker')
            var datetime = button.getAttribute('data-bs-datetime')
            var price = button.getAttribute('data-bs-price')
            var link = button.getAttribute('data-bs-link')
            var webinarImage = button.getAttribute('data-bs-picture')
            console.log(id+title+speaker+datetime+price+link)
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var inputId = editWebinarModal.querySelector('.modal-body input[name="id"]')
            inputId.value = id
            var inputTitle = editWebinarModal.querySelector('.modal-body input[name="title"]')
            inputTitle.value = title
            var inputSpeaker = editWebinarModal.querySelector('.modal-body input[name="speaker"]')
            inputSpeaker.value = speaker
            var inputDatetime = editWebinarModal.querySelector('.modal-body input[name="datetime"]')
            inputDatetime.value = datetime
            var inputPrice = editWebinarModal.querySelector('.modal-body input[name="price"]')
            inputPrice.value = price
            var inputLink = editWebinarModal.querySelector('.modal-body input[name="link"]')
            inputLink.value = link

            var inputImage = editWebinarModal.querySelector('.modal-body input[name="photo_webinar"]')
            // inputPicture.setAttribute("data-default-file", profile);
            var drEvent = $(inputImage).dropify();
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();
            drEvent.settings.defaultFile = webinarImage;
            drEvent.destroy();
            drEvent.init();
            $(inputImage).dropify({
            defaultFile: webinarImage,
            });
        })

        var editWebinarModal = document.getElementById('editWebinar')
        editWebinarModal.addEventListener('hidden.bs.modal', function (event) {
            var inputImage = editWebinarModal.querySelector('.modal-body input[name="photo_webinar"]')
            console.log('close', inputImage)
            var drEvent = $(inputImage).dropify();
            drEvent = drEvent.data('dropify');
            drEvent.resetPreview();
            drEvent.clearElement();

        })
        // end edit Webinar modal
    </script>
@endsection
