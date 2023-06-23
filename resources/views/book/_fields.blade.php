@csrf
<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-title">{{ __('Title') }}</label>
        <input type="text" name="title" id="input-title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" 
        value="{{ isset($book) ? $book->title : "" }}" required autofocus>

        @if ($errors->has('title'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('lastName') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">{{ __('Author') }}</label>
        <select name="authorId"
                    id="input-authorId"
                    class="form-control form-control-alternative{{ $errors->has('authorId') ? ' is-invalid' : '' }}"
                    required>
                <option value="" selected disabled hidden>Select an author</option>
                @foreach($authors as $author)
                    <option value="{{$author->id}}"
                            @if(isset($book) && $book->author_id == $author->id) selected @endif>
                        {{$author->name.' '.$author->last_name}}
                    </option>
                @endforeach
            </select>
    </div>
    <div class="form-group{{ $errors->has('totalCopies') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-totalCopies">{{ __('Total Copies') }}</label>
        <input type="number" name="totalCopies" id="input-totalCopies" class="form-control form-control-alternative{{ $errors->has('totalCopies') ? ' is-invalid' : '' }}" placeholder="{{ __('Total Copies') }}" 
        value="{{ isset($book) ? $book->total_copies : "" }}" required autofocus>

        @if ($errors->has('totalCopies'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('totalCopies') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('availableCopies') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-availableCopies">{{ __('Available Copies') }}</label>
        <input type="number" name="availableCopies" id="input-availableCopies" class="form-control form-control-alternative{{ $errors->has('availableCopies') ? ' is-invalid' : '' }}" placeholder="{{ __('Available Copies') }}" 
        value="{{ isset($book) ? $book->available_copies : "" }}" required autofocus>

        @if ($errors->has('availableCopies'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('availableCopies') }}</strong>
            </span>
        @endif
    </div>
</div>