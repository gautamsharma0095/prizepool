
@extends('layouts/contentLayoutMaster')

@section('title', 'Match List')

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
          <div class="col-sm-12">
            <div class="card overflow-hidden">
              <div class="card-content">
                <div class="card-body pb-0 pt-0">
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                    <a class="nav-link {{ isset($ongoing) ? 'active':'' }}" id="home-tab"  href="{{ route('ongoing', ['id'=> $gameId])}}" aria-controls="home" role="tab" aria-selected="{{ isset($ongoing) ? 'true':'false' }}">ONGOING</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ isset($upcoming) ? 'active':'' }}" id="profile-tab"  href="{{ route('upcoming', ['id'=> $gameId])}}" aria-controls="profile" role="tab" aria-selected="{{ isset($upcoming) ? 'true':'false' }}">UPCOMING</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link {{ isset($finished) ? 'active':'' }}" id="about-tab"  href="{{ route('finished', ['id'=> $gameId])}}" aria-controls="about" role="tab" aria-selected="{{ isset($finished) ? 'true':'false' }}">RESULTS</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('matches/grid')
    </section>
    <!-- Dashboard Analytics end -->
@endsection
