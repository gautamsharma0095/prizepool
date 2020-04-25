@extends('layouts/contentLayoutMaster')

@section('title', 'Refer & Earn')

@section('page-style')
    <link rel="stylesheet" href="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <style>
        .promo-code-badge{
            border: 1px solid;
            border-style: dashed;
        }
        .label-info{
            background: #7367f0 !important;
            padding: 3px 9px !important;
            border-radius: 3px !important;
        }
        .bootstrap-tagsinput{
            width: 100% !important;
        }
    </style>
@endsection

@section('content')
    <!-- users edit start -->
    <section class="users-edit">
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif

        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
                @php
                    Session::forget('error');
                @endphp
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <div class="row mb-5 mt-2">
                    <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                        <div class="d-flex align-items-center justify-content-center">
                            <img src="{{ asset('assets/refer-and-earn.jpg') }}" class="img-fluid"
                                 alt="product image">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <center><h5 class="text-warning">REFER MORE TO EARN MORE
                            </h5></center>
                        <p class="text-muted">Invite your friends using your <code class="text-primary">Promo Code</code> to Earn 10 Rs when they join first paid match. Your friends also get 5 Rs as Sign Up Bonus!</p>
                        <hr>
                        <center>
                            <h6>YOUR PROMO CODE</h6>
                            <label class="badge badge-warning badge-xl promo-code-badge">{{ auth()->user()->refer }}</label>
                        </center>
                        <hr>
                        <div class="d-flex flex-column flex-sm-row">
                            {{--<button class="btn btn-primary mr-0 mr-sm-1 mb-1 mb-sm-0"><i--}}
                                        {{--class="feather icon-shopping-cart mr-25"></i>ADD TO CART--}}
                            {{--</button>--}}
                            <button class="btn btn-primary" data-toggle="modal" data-backdrop="false"
                                    data-target="#backdrop" style="width:100%">REFER NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade text-left" id="backdrop" role="dialog" >
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel4">Refer Now</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('send-code') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-label-group mt-1">
                                <input type="text" id="emailTo" class="form-control tag-email" placeholder="Email Id(s)" name="emailTo" required>
                                <label for="emailTo">To</label>
                            </div>
                            <span class="text-muted">* To add multiple email use comma ',' / enter</span>
                            <hr>
                            @include('global.refer-mail-body')
                            <hr>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-success" >Send Promo Code</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- users edit ends -->
@endsection

@section('page-script')
    <script src="http://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script>
        $('.tag-email').tagsinput();
    </script>
@endsection

