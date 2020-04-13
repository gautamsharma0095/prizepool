
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
                      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" aria-controls="home" role="tab" aria-selected="true">ONGOING</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" role="tab" aria-selected="false">UPCOMING</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="about-tab" data-toggle="tab" href="#about" aria-controls="about" role="tab" aria-selected="false">RESULTS</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include($matchBlade)
    </section>
    <!-- Dashboard Analytics end -->
@endsection
