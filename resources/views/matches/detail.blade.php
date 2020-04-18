
@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')

    <section id="dashboard-analytics">
      <section id="nav-justified">
        <div class="row">
          <div class="col-sm-12">
            <div class="card overflow-hidden">

              <div class="card-content">
                <div class="card-body">
                  <ul class="nav nav-pills nav-justified mb-0" id="myTab2" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="true">Game Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="false">Participants</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="messages-tab-justified" data-toggle="tab" href="#messages-just" role="tab" aria-controls="messages-just" aria-selected="false">Match Rules</a>
                    </li>

                  </ul>


                  <div class="tab-content pt-1">
                    <div class="tab-pane active" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
                      <div class="card" >
                        <div class="card-content">
                            <div class="card-body p-1" >
                                <img class="card-img img-fluid mb-1" src="http://prizepool.skywinner.in/admin/upload/5e08ec108b05a6.09178616.thumb-1920-782653.png" style="width: 100%; object-fit: cover;" alt="Card image cap">
                                <div class="container">
                                    <div class="row mb-1">
                                        <div class="col">
                                            <label class="pl-0">Prize Pool</label><br>
                                            <span class="text-{{ Helper::bootClass() }}">{{ $match->prize_pool }}</span>
                                        </div>
                                        <div class="col">
                                            <label class="pl-0">Type</label><br>
                                            <span class="text-{{ Helper::bootClass() }}">{{ $match->match_type }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-1">
                                        <div class="col">
                                            <label class="pl-0">Per Kill</label><br>
                                            <span class="text-{{ Helper::bootClass() }}">{{ $match->per_kill }}</span>
                                        </div>
                                        <div class="col">
                                            <label class="pl-0">Version</label><br>
                                            <span class="text-{{ Helper::bootClass() }}">{{ $match->version }}</span>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <label class="pl-0">Entry Fees</label><br>
                                            <span class="text-{{ Helper::bootClass() }}">{{ $match->entry_fees }}</span>
                                        </div>
                                        <div class="col">
                                            <label class="pl-0">Map</label><br>
                                            <span class="text-{{ Helper::bootClass() }}">{{ $match->map }}</span>
                                        </div>
                                    </div>
                                    @if(isset($roomDetail) && $roomDetail)
                                        <hr>
                                        <div class="row">
                                            <div class="col">
                                                <label class="pl-0">Room Detail</label><br>
                                                <span class="text-{{ Helper::bootClass() }}">{{ $match->map }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="card-btns d-flex justify-content-between">
                                        <a href="#" class="btn gradient-light-success white waves-effect waves-light">Spectate</a>
                                        <a href="{{ url('/match', $match->id) }}" class="btn gradient-light-primary white waves-effect waves-light float-right">Play Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-justified">
                      <div class="card">
                        <div class="card-content">
                            <div class="card-body p-1" >
                            <div class="divider divider-warning mb-2">
                              <div class="divider-text">Total participant(s) - <div class="badge badge-primary">{{ $totalParticipants }}</div></div>
                            </div>
                              @foreach($participants as $participant)
                                <div class="chip chip-{{ Helper::bootClass() }} mr-1">
                                  <div class="chip-body">
                                    <div class="avatar">
                                      <span><i class="feather icon-user"></i></span>
                                    </div>
                                    <span class="chip-text"><b>{{ $participant->pubg_id }} </b> - </span>
                                    <span class="chip-text"> {{ Helper::showDate($participant->created) }}</span>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="tab-pane" id="messages-just" role="tabpanel" aria-labelledby="messages-tab-justified">
                      <div class="card">
                    <div class="card-content">
                        <div class="card-body p-1" >
                            {!! $match->rule->rules !!}
                        </div>
                    </div>
                </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>
@endsection
