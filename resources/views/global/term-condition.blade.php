
@extends('layouts/contentLayoutMaster')

@section('title', 'Term & Conditions')

@section('content')
<section id="nav-justified">
    <div class="divider divider-danger mb-2 mt-0">
        <div class="divider-text">Term & Conditions</div></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <span>{!! $termCondition->content !!}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
