<div class="card" >
    <div class="card-content">
        <div class="card-body p-1" >
            <img class="card-img img-fluid mb-1" src="http://prizepool.skywinner.in/admin/upload/5e08ec108b05a6.09178616.thumb-1920-782653.png" style="width: 100%; object-fit: cover;" alt="Card image cap">
            <div class="container">
                <div class="row mb-1">
                    <div class="col">
                        <label class="pl-0">Prize Pool</label><br>
                        <span>{{ $match->prize_pool }}</span>
                    </div>
                    <div class="col">
                        <label class="pl-0">Type</label><br>
                        <span>{{ $match->match_type }}</span>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col">
                        <label class="pl-0">Per Kill</label><br>
                        <span>{{ $match->per_kill }}</span>
                    </div>
                    <div class="col">
                        <label class="pl-0">Version</label><br>
                        <span>{{ $match->version }}</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label class="pl-0">Entry Fees</label><br>
                        <span>{{ $match->entry_fees }}</span>
                    </div>
                    <div class="col">
                        <label class="pl-0">Map</label><br>
                        <span>{{ $match->map }}</span>
                    </div>
                </div>
                @if(isset($roomDetail) && $roomDetail)
                    <hr>
                    <div class="row">
                        <div class="col">
                            <label class="pl-0">Room Detail</label><br>
                            <span>{{ $match->map }}</span>
                        </div>
                    </div>
                @endif

                @isset($upcoming)
                <div class="text-center" id="example-caption-2">25 slot left</div>
                <div class="progress progress-bar-primary">
                  <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="100" style="width:25%" aria-describedby="example-caption-2"></div>
                </div>
                @endisset

                <div class="card-btns d-flex justify-content-between">
                  @isset($upcoming)
                    <button type="button" class="btn btn-outline-success waves-effect waves-light block btn-lg" data-toggle="modal" data-backdrop="false"
                    data-target="#backdrop">
                    <i class="fa fa-plus"></i> Join
                    </button>
                  @endisset

                  @isset($ongoing)
                  <a href="#" class="btn gradient-light-success white waves-effect waves-light">Spectate</a>
                  <a href="{{ url('/match', $match->id) }}" class="btn gradient-light-primary white waves-effect waves-light float-right">Play Now</a>
                  @endisset

                </div>
            </div>
        </div>
    </div>
</div>
