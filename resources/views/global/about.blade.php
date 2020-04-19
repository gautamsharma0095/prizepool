
@extends('layouts/contentLayoutMaster')

@section('title', 'About us')

@section('content')
<section id="nav-justified">
    <div class="divider divider-info mb-2 mt-0">
        <div class="divider-text">About us</div></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <span>{!! $about->content !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
