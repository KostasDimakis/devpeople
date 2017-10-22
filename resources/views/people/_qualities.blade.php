<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Qualities
                </div>
                <div class="panel-body">
                    @foreach($qualities as $quality)
                        <div class="col-md-2">
                            <label class="text-muted text-center center-block">{{ $quality->name }}</label>
                            <img class="img-circle center-block" width="128" height="128" src="{{ asset('/img/'.$quality->image_asset) }}">
                            <h3 class="text-center">{{ $person->commentsReceived()->where('quality_id', '=', $quality->id)->count() }}</h3>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>