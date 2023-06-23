@csrf
<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" 
        value="{{ isset($author) ? $author->name : "" }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('lastName') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-email">{{ __('Last Name') }}</label>
        <input type="text" name="lastName" id="input-lastName" class="form-control form-control-alternative{{ $errors->has('lastName') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" 
        value="{{ isset($author) ? $author->last_name : "" }}" required>

        @if ($errors->has('lastName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
    </div>
</div>