<ul class="media-list">
    @foreach($person->commentsReceived as $comment)
        <li class="media">
            <div class="media-left">
                <a href="{{ $comment->author->id }}">
                    <img class="media-object img-circle center-block" src={{ $comment->author->gravatar }} alt="">
                </a>
            </div>
            <div class="media-body">
                <div class="media-heading">
                    <strong>
                        <a href="{{ $comment->author->id }}">{{ $comment->author->name }}</a>
                    </strong>
                    <img class="img-circle" width="30" height="30" data-toggle="tooltip" data-placement="top"
                         title="{{ $comment->quality->name }}"
                         src="{{ asset('/img/'.$comment->quality->image_asset) }}">
                    <span class="text-muted">{{ $comment->updated_at->diffForHumans() }}</span>
                    @if($comment->author->id == Auth::user()->id)
                        <div class = "pull-right">
                            {{ Form::open(['method' => 'DELETE', 'url' => 'people/'.$person->id.'/comments/'.$comment->id]) }}
                                {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn-icon']) }}
                            {{ Form::close() }}
                        </div>
                    @endif
                </div>
                <p style="word-break: break-all">{{ $comment->body }}</p>
            </div>
        </li>
        <hr>
    @endforeach
</ul>