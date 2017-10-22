<!-- Body Form Input -->
<div class = "form-group">
    {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '2', 'placeholder' => 'Write a comment...', 'style' => 'resize:none']) }}
</div>

<!-- Radio Form Input -->
<div class = "form-group">
    @foreach($qualities as $quality)
        <div class="col-md-2">
            {{ Form::radio('quality', $quality->id, ['class' => 'form-control']) }}
            <img class="img-circle" width="50" height="50" data-toggle="tooltip" data-placement="top"
                 title="{{ $quality->name }}"
                 src="{{ asset('/img/'.$quality->image_asset) }}">
        </div>
    @endforeach
</div>

<!-- Submit Form Input -->
<div class = "form-group" >
    {{ Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) }}
</div>