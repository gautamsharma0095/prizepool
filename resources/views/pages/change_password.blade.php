
@extends('layouts/contentLayoutMaster')

@section('title', 'Change Password')

@section('content')

@if(Session::has('success'))

<div class="alert alert-success">
    {{ Session::get('success') }}
    @php
        Session::forget('success');
    @endphp
</div>
@endif
<!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row match-height">
      <div class="col-md-6 col-12">
          <div class="card">
              <div class="card-header">
                  <h4 class="card-title">Change Password</h4>
              </div>
              <div class="card-content">
                  <div class="card-body">
                  <form class="form form-horizontal" action="{{ route('changePasswordAction') }}" method="POST">
                    @csrf
                          <div class="form-body">
                              <div class="row">
                                  <div class="col-12">
                                      <div class="form-group row">
                                          <div class="col-md-4">
                                            <span>Current Password</span>
                                          </div>
                                          <div class="col-md-8">
                                              <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Current Password">
                                              @if ($errors->has('current_password'))
                                                <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                          <span>New Password</span>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="password" id="new_password" class="form-control" name="new_password" placeholder="New Password">
                                            @if ($errors->has('new_password'))
                                              <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group row">
                                      <div class="col-md-4">
                                        <span>Confirm  Password</span>
                                      </div>
                                      <div class="col-md-8">
                                          <input type="password" id="confirmed" class="form-control" name="confirmed" placeholder="Confirm  Password">
                                          @if ($errors->has('confirmed'))
                                              <span class="text-danger">{{ $errors->first('confirmed') }}</span>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                              </div>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
<!-- // Basic Horizontal form layout section end -->
@endsection
