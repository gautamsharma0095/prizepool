
@extends('layouts/contentLayoutMaster')

@section('title', 'Match List')

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
          <div class="col-sm-12">
            <div class="card overflow-hidden">
              <div class="card-content">
                <div class="card-body pb-0 pt-0">
                  <ul class="nav nav-pills mt-1" role="tablist">
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

    @isset($upcoming)
    <!-- Join Modal Start -->
      {{-- Modal --}}
      <div class="modal fade text-left" id="backdrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel4">Disabled Backdrop</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>
                Candy oat cake topping topping chocolate cake. Icing pudding jelly beans I love chocolate carrot
                cake wafer candy canes. Biscuit croissant fruitcake bonbon soufflé.
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div>
          </div>
        </div>
      </div>
    <!-- Join Modal End -->
    @endisset
    @endsection
