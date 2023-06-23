@csrf
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="pl-lg-4">
    <div class="form-group{{ $errors->has('memberId') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-memberId">{{ __('Member') }}</label>
        <select name="memberId"
                    id="input-memberId"
                    class="form-control form-control-alternative{{ $errors->has('memberId') ? ' is-invalid' : '' }}"
                    required>
                <option value="" selected disabled hidden>Select a member</option>
                @foreach($members as $member)
                    <option value="{{$member->id}}">
                        {{$member->name.' '.$member->last_name}}
                    </option>
                @endforeach
            </select>
    </div>
    <div class="form-group{{ $errors->has('bookId') ? ' has-danger' : '' }}">
        <label class="form-control-label" for="input-bookId">{{ __('Book') }}</label>
        <select name="bookId"
                    id="input-bookId"
                    class="form-control form-control-alternative{{ $errors->has('bookId') ? ' is-invalid' : '' }}"
                    required>
                <option value="" selected disabled hidden>Select a book</option>
                @foreach($books as $book)
                    <option value="{{$book->id}}">
                        {{$book->title}}
                    </option>
                @endforeach
            </select>
    </div>
</div>