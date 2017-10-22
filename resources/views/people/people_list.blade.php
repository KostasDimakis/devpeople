@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h1>People</h1>
                <hr>
                @unless($people->isEmpty())
                    <ul class="media-list">
                    @foreach($people as $person)
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src={{ $person->gravatar }} alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <a href="{{ url('people', $person->id) }}">
                                    <h4 class="media-heading">{{ $person->name }}</h4>
                                    <p>{{ $person->email }}</p>
                                </a>
                            </div>
                        </li>
                        <hr>
                    @endforeach
                    </ul>
                @endunless
            </div>
        </div>
    </div>
@endsection