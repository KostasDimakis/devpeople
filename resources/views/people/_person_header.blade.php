<div class="container text-center">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img class="img-responsive img-circle center-block" src="{{ $person->gravatar200 }}" alt="">
            <h3>{{ $person->name }}</h3>
            <h4>{{ $person->email }}</h4>
        </div>
    </div>
</div>