@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Profile')

@section('vendor-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/app-user.css')) }}">

@endsection

@section('content')
    <!-- users edit start -->
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    @if(Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                            @php
                                Session::forget('success');
                            @endphp
                        </div>
                    @endif
                    <div class="tab-content">
                        <div class="media mb-2">
                            <a class="mr-2 my-25" href="#">
                                <img src="{{ asset('images/portrait/small/avatar-s-12.jpg') }}" alt="users avatar"
                                     class="users-avatar-shadow rounded" height="77" width="77">
                                <form action="{{ route('profile.upload', $profile->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" name="profile" accept="image/*" id="profilePicker" style="display: none"/>
                                </form>
                            </a>
                            <div class="media-body mt-50">
                                <h4 class="media-heading">Angelo Sashington</h4>
                                <div class="col-12 d-flex mt-1 px-0">
                                    <a href="#" class="btn btn-primary d-none d-sm-block mr-75 profilePicker">Change</a>
                                    <a href="#" class="btn btn-primary d-block d-sm-none mr-75 profilePicker"><i
                                                class="feather icon-edit-1"></i></a>
                                    <a href="#" class="btn btn-outline-danger d-none d-sm-block">Remove</a>
                                    <a href="#" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- users edit account form start -->
                        <form class="form form-horizontal" action="{{ route('profile.update', $profile->id) }}" method="POST">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" placeholder="First Name" value="{{ $profile->fname }}" required
                                                   data-validation-required-message="This first name field is required" name="fname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" placeholder="Last Name" value="{{ $profile->lname }}" required
                                                   data-validation-required-message="This last name field is required" name="lname">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Date Of Birth</label>
                                        <input type='text' class="form-control pickadate-months-year" name="dateOfBirth" value="{{ $profile->dob }}"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label><br>
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-radio-con vs-radio-primary">
                                                    <input type="radio" name="gender" value="true" {{ $profile->gender != 'f' ? 'checked' : ''}}>
                                                    <span class="vs-radio">
                                                  <span class="vs-radio--border"></span>
                                                  <span class="vs-radio--circle"></span>
                                                </span>
                                                    <span class="">Male</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                        <li class="d-inline-block mr-2">
                                            <fieldset>
                                                <div class="vs-radio-con vs-radio-info">
                                                    <input type="radio" name="gender" value="false" {{ $profile->gender == 'f' ? 'checked' : ''}}>
                                                    <span class="vs-radio">
                                                  <span class="vs-radio--border"></span>
                                                  <span class="vs-radio--circle"></span>
                                                </span>
                                                    <span class="">Female</span>
                                                </div>
                                            </fieldset>
                                        </li>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Username</label>
                                            <input type="text" class="form-control" placeholder="Username" value="{{ $profile->username }}" required
                                                   data-validation-required-message="This username field is required" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" placeholder="Name" value="{{ $profile->mobile }}" required
                                                   data-validation-required-message="This name field is required" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>E-mail</label>
                                            <input type="email" class="form-control" placeholder="Email" value="{{ $profile->email }}"
                                                   required data-validation-required-message="This email field is required" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- users edit ends -->
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
@endsection

@section('page-script')
    <script>
        $('.pickadate-months-year').pickadate({
            format: 'dd/mm/yyyy'
        });

        $(".profilePicker").click(function () {
           $("#profilePicker").trigger('click');
        });

        $("#profilePicker").on('change', function () {
            var form = $(this).closest('form');
            form.submit();
        });
    </script>
@endsection

