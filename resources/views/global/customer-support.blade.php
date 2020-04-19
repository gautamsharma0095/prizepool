
@extends('layouts/contentLayoutMaster')

@section('title', 'Customer Support')

@section('content')
<style>
    .fa{
        font-size: 30px;
        margin: 8px;
    }
</style>
<section id="nav-justified">
    <div class="divider divider-primary mb-2 mt-0">
        <div class="divider-text">Customer support</div></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="divider divider-danger mt-0">
                            <div class="divider-text">Our Mission</div>
                        </div>
                        <span>{{ $support->title }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="divider divider-danger mt-0">
                            <div class="divider-text">Contact Us</div>
                        </div>
                        <label class="pl-0">Email Id</label>
                        <p><a href="mailto:{{ $support->email }}">{{ $support->email }}</a></p>
                        <label class="pl-0">Phone No.</label>
                        <p><a href="tel:{{ $support->phone }}">{{ $support->phone }}</a></p>
                        <label class="pl-0">Whatsapp No.</label>
                        <p>{{ $support->whatsapp_no }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="divider divider-danger mt-0">
                            <div class="divider-text">Our Address</div>
                        </div>
                        <span>{!! nl2br($support->address) !!}</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="divider divider-danger mt-0">
                            <div class="divider-text">Follow Us</div>
                        </div>
                        <center>
                            <a href="{{ $support->twitter_follow }}"><i class="fa fa-twitter-square text-info"></i></a>
                            <a href="{{ $support->youtube_follow }}"><i class="fa fa-youtube-play text-danger"></i></a>
                            <a href="{{ $support->fb_follow }}"><i class="fa fa-facebook-square text-primary"></i></a>
                            <a href="{{ $support->ig_follow }}"><i class="fa fa-instagram text-warning"></i></a>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
