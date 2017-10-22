@extends('layouts.app')

@section('content')

    @include('people._person_header')

    @include('people._qualities')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Comments
                    </div>
                    <div class="panel-body">
                        @if($person->commentsReceived->isEmpty())
                            <p>No comments for {{ $person->name }}.</p>
                            <hr>
                        @else
                            @include('people.comments._comments')
                        @endif

                        @unless($person->id == Auth::user()->id)
                            @if(Auth::user()->last_comment_at->addWeek()->lt(\Carbon\Carbon::now()))
                                @include('people.comments._write_comment')
                            @else
                               <p>Cannot comment until {{ Auth::user()->last_comment_at->addWeek()->diffForHumans() }}.</p>
                            @endif
                        @endunless
                    </div>
                </div>
                @include('errors._list')
            </div>
        </div>
    </div>
@endsection