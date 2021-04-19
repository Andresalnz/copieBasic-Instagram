
<form method="POST" action="{{ route('Comment.save') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="image_id" value="{{ $image->id }}" />
    <p>
        <textarea class="form-control" name="content" required=""></textarea>

        @if($errors->has('content'))
            <span class="invalid-feedback" role="alert">
                <strong>
                    {{ $errors->first('content') }}
                </strong>
            </span>
        @endif
    </p>
    <input class="btn btn-success" type="submit" value="Enviar" />
</form>
