@extends('layouts.app', ['title' => __('')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Borrowed Books') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('borrowedBook.create') }}" class="btn btn-sm btn-primary">{{ __('Add borrow') }}</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Member') }}</th>
                                    <th scope="col">{{ __('Book') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrowedBooks as $borrowedBook)
                                    <tr>
                                        <td>{{ $borrowedBook->book->title }}</td>
                                        <td>{{ $borrowedBook->member->name.' '.$borrowedBook->member->last_name }}</td>
                                        <td>{{ $borrowedBook->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{$borrowedBooks->links()}}  
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection