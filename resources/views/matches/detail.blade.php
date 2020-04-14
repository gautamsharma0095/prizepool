
@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')

    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                @include('matches.match', ['roomDetail' => true])
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body p-1" >
                            <h6 class="pl-2 pt-1">Participants</h6>
                            <hr>
                            {!! $match->rule->rules !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body p-1" >
                            <h6 class="pl-2 pt-1">Match Rules & Regulations</h6>
                            <hr>
                            {!! $match->rule->rules !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
