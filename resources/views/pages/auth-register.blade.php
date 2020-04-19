@extends('layouts/fullLayoutMaster')

@section('title', 'Register Page')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection
@section('content')
<section class="row flexbox-container">
  <div class="col-xl-8 col-10 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0">
          <div class="row m-0">
              <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                  <img src="{{ asset('images/pages/register.jpg') }}" alt="branding logo">
              </div>
              <div class="col-lg-6 col-12 p-0">
                  <div class="card rounded-0 mb-0 p-2">
                      <div class="card-header pt-50 pb-1">
                          <div class="card-title">
                              <h4 class="mb-0">Create Account</h4>
                          </div>
                      </div>
                      <p class="px-2">Fill the below form to create a new account.</p>
                      <div class="card-content">
                          <div class="card-body pt-0">
                              <form action="dashboard-analytics">
                                  <div class="form-label-group">
                                      <input type="text" id="inputName" class="form-control" placeholder="First Name" required>
                                      <label for="inputName">First Name</label>
                                  </div>
                                  <div class="form-label-group">
                                      <input type="text" id="inputLastName" class="form-control" placeholder="Last Name" required>
                                      <label for="inputLastName">Last Name</label>
                                  </div>
                                  <div class="form-label-group">
                                      <input type="text" id="inputUserName" class="form-control" placeholder="User Name" required>
                                      <label for="inputUserName">User Name</label>
                                  </div>
                                  <div class="form-label-group">
                                      <input type="text" id="inputUserName" class="form-control" placeholder="Your 10 digit phone number." pattern="^\d{10}$" required>
                                      <label for="phone">Phone Number</label>
                                  </div>
                                  <div class="form-label-group">
                                      <input type="email" id="inputEmail" class="form-control" placeholder="Email" required>
                                      <label for="inputEmail">Email</label>
                                  </div>
                                  <div class="form-label-group">
                                      <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                      <label for="inputPassword">Password</label>
                                  </div>
                                  <div class="form-label-group">
                                      <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" required>
                                      <label for="inputConfPassword">Confirm Password</label>
                                  </div>

                                  <div class="form-label-group">
                                      <input type="text" id="promoCode" class="form-control" placeholder="Promo Code (optional)" required>
                                      <label for="promoCode">Promo Code</label>
                                  </div>
                                  <div class="form-group row">
                                      <div class="col-12">
                                          <fieldset class="checkbox">
                                            <span class=""> By Registring, I agree to SkyWinner's <a href="#" data-toggle="modal" data-target="#large"> Terms & conditions and Privacy Policy</a>.</span>
                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                              <input type="checkbox" checked>
                                              <span class="vs-checkbox">
                                                <span class="vs-checkbox--check">
                                                  <i class="vs-icon feather icon-check"></i>
                                                </span>
                                              </span>
                                            </div>                                        
                                          </fieldset>
                                      </div>
                                  </div>
                                  <a href="auth-login" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                  <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

    <div class="modal fade text-left " id="large" role="dialog" >
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <ul class="nav nav-pills nav-justified mb-0" id="myTab2" role="tablist">                 
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#term" role="tab">Terms & Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#privacy" role="tab">Privacy Policy</a>
                    </li>
                </ul>
                <div class="tab-content pt-1">
                    <div class="tab-pane active" id="term">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    {!! $term->content !!}
                                </div>    
                            </div>
                        </div>              
                    </div>
                    <div class="tab-pane" id="privacy">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    {!! $policy->content !!}
                                </div>    
                            </div>
                        </div>                    
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
