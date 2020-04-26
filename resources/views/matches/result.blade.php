
@extends('layouts/contentLayoutMaster')

@section('title', 'Home')

@section('content')

    <section id="dashboard-analytics">
      <section id="nav-justified">
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-content">
                <div class="card-body text-center">
                <h2 class="card-title" style="font-size: 1.72rem;">{{ $match->title }}</h2>
                  <p class="card-text">Organized On {{ $match->time }}.</p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-6">
                        <h4>Win Prize</h4>
                        <span>Winning prize for this match</span>
                      </div>
                      <div class="col-3" style="padding-right: 0px;">
                       <h4 class="float-right align-middle" style="padding: 2.1%;">{{ $match->prize_pool }}</h4>
                      </div>
                      <div class="col-3">
                        <img src="https://lh3.googleusercontent.com/proxy/OcPwdtBRPnm7jBWTHFZt8e0MXje77E1ZJJr8wZWBK7azetcM5t6kU8CuB3dlLABj5Z93IHDSBAqVWj9UoK8Xfs04Ivuy-ijEUXyZZXLg6_FK7-TRW_o1SAVRCYM" style="max-width: 50px;">
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-6">
                        <h4>Per Kill</h4>
                        <span>Earn prize per kill</span>
                      </div>
                      <div class="col-3" style="padding-right: 0px;">
                       <h4 class="float-right align-middle" style="padding: 2.1%;">{{ $match->per_kill }}</h4>
                      </div>
                      <div class="col-3">
                        <img src="https://lh3.googleusercontent.com/proxy/OcPwdtBRPnm7jBWTHFZt8e0MXje77E1ZJJr8wZWBK7azetcM5t6kU8CuB3dlLABj5Z93IHDSBAqVWj9UoK8Xfs04Ivuy-ijEUXyZZXLg6_FK7-TRW_o1SAVRCYM" style="max-width: 50px;">
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col-6">
                        <h4>Entry Fee</h4>
                        <span>Entry fee of this match</span>
                      </div>
                      <div class="col-3" style="padding-right: 0px;">
                       <h4 class="float-right align-middle" style="padding: 2.1%;">{{ $match->entry_fee }}</h4>
                      </div>
                      <div class="col-3">
                        <img src="https://lh3.googleusercontent.com/proxy/OcPwdtBRPnm7jBWTHFZt8e0MXje77E1ZJJr8wZWBK7azetcM5t6kU8CuB3dlLABj5Z93IHDSBAqVWj9UoK8Xfs04Ivuy-ijEUXyZZXLg6_FK7-TRW_o1SAVRCYM" style="max-width: 50px;">
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="card-body">
                  <div class="card">
                    <div class="text-center mb-1 mt-1">
                      <h4 class="card-title"><i class="fa fa-flag"></i> Winner Winner Chicken Dinner <i class="fa fa-flag"></i></h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped mb-0">
                              <thead>
                                  <tr>
                                      <th scope="col">Player Name</th>
                                      <th scope="col">Kills</th>
                                      <th scope="col">Winning</th>
                                  </tr>
                            </thead>
                            <tbody>
                            @foreach ($firstThreeWinner as $winner)
                              <tr>
                                <td>{{ $winner->pubg_id }}</td>
                                <td>{{ $winner->kills }}</td>
                                <td>{{ $winner->prize }}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                      </div>
                      </div>
                    </div>

                  </div>
                  <div class="card">
                    <div class="text-center mb-1 mt-1">
                      <h4 class="card-title">Full Result</h4>
                    </div>
                    <div class="card-content">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-striped mb-0">
                              <thead>
                                  <tr>
                                      <th scope="col">Player Name</th>
                                      <th scope="col">Kills</th>
                                      <th scope="col">Winning</th>
                                  </tr>
                            </thead>
                            <tbody>
                            @foreach ($fullResult as $winner)
                              <tr>
                                <td>{{ $winner->pubg_id }}</td>
                                <td>{{ $winner->kills }}</td>
                                <td>{{ $winner->prize }}</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
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
