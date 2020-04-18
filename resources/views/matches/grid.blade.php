<div class="row">
    @foreach($matches as $match)
        <div class="col-xl-4 col-md-6 col-sm-12">
            @include('matches.match')
        </div>
    @endforeach
</div>