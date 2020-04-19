
@extends('layouts/contentLayoutMaster')

@section('title', 'Privacy Policy')

@section('content')
<section id="nav-justified">
    <div class="divider divider-warning mb-2 mt-0">
        <div class="divider-text">Privacy Policy</div></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <span>{!! $privacyPolicy->content !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
