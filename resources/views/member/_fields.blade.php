@csrf
<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" 
        value="{{ isset($member) ? $member->name : "" }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('lastName') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-lastName">{{ __('Last Name') }}</label>
        <input type="text" name="lastName" id="input-lastName" class="form-control form-control-alternative{{ $errors->has('lastName') ? ' is-invalid' : '' }}" placeholder="{{ __('Last Name') }}" 
        value="{{ isset($member) ? $member->last_name : "" }}" required>

        @if ($errors->has('lastName'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('lastName') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-phone">{{ __('Phone') }}</label>
        <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone') }}" 
        value="{{ isset($member) ? $member->phone : "" }}" required>

        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('borrowedBooksLimit') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-borrowedBooksLimit">{{ __('Borrowed Books Limit') }}</label>
        <input type="number" name="borrowedBooksLimit" id="input-borrowedBooksLimit" class="form-control form-control-alternative{{ $errors->has('borrowedBooksLimit') ? ' is-invalid' : '' }}" placeholder="{{ __('Borrowed Books Limit') }}" 
        value="{{ isset($member) ? $member->borrowed_books_limit : "" }}" required>

        @if ($errors->has('borrowedBooksLimit'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('borrowedBooksLimit') }}</strong>
            </span>
        @endif
    </div>
    
    <div class="form-group{{ $errors->has('active') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-active">{{ __('Active') }}</label>
        <input type="hidden" name="active" value="0">
        <input type="checkbox" name="active" value="1"
        @if(isset($member) && $member->active == 'true') checked @endif>

        @if ($errors->has('active'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('active') }}</strong>
            </span>
        @endif
    </div>
</div>