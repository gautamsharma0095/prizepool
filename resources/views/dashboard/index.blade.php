
@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')
    {{-- Dashboard Analytics Start --}}
    <section id="dashboard-analytics">
        <div class="row">
            @foreach($games as $game)
                <div class="col-md-4 col-12">
                    <div class="card">
                        <div class="card-content">
                            <a href="{{ $game->type ? $game->url : url('/match/ongoing', $game->id) }}">
                                <div class="card-body" style="padding: 8px;">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="http://prizepool.skywinner.in/admin/{{ $game->banner }}" style="object-fit: cover;height: 200px; width: 100%">
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="row">
                                        <div class="col-12">
                                            <center><h6>{{ $game->title }}</h6></center>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Dashboard Analytics end -->
@endsection
