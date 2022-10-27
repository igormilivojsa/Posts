@extends('layout.app')

@section('content')
    
    @include('layout.navigation')
    
    @foreach ($users as $user)
        <a class="text-dark text-decoration-none" href="/users/{{ $user->id }}">
            <div id="users-list" class="container mb-2 mt-3">
    
                <div class="row col-md-9 col-md-pull-3">
                    <section class="search-result-item">
                        <div class="col search-result-item-body">
                            <div class="row">
                                <div class="col-sm-9 border">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img id="prifile-image" src="" alt="#">
                                        </div>
                                        <div class="col-sm-10">
                                            <h4 class="search-result-item-heading">
                                                {{ $user->name }}
                                            </h4><p class="info">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div hidden class="col-sm-3 text-align-center"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </a>
    @endforeach
    
@endsection