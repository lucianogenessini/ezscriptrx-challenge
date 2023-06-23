@extends('layouts.app', ['title' => __('borrowedBook')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Create a new borrowed'),
    ])   

    <div class="container-fluid mt--7">
        <div class="row">
            
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('borrowedBook.store') }}" autocomplete="off">
                                @include('borrowedBook._fields')
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Borrow') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection