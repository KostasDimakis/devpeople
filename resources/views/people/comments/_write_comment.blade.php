<div class="media">
    <div class="media-left">
        <img class="media-object img-circle center-block" src="{{ Auth::user()->gravatar }}" alt="">
    </div>
    <div class="media-body">
        <div class="media-heading">
            <strong>{{ Auth::user()->name }}</strong>
        </div>
        {{ Form::open(['url' => url('/people', [$person->id, 'comments'])]) }}
            @include('people.comments._form', ['submitButtonText' => 'Submit'])
        {{ Form::close() }}
    </div>
</div>