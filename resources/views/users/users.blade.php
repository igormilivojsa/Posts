@extends('layout.app')

@section('content')
    
    @include('layout.navigation')

    @foreach ($users as $user)
        <a class="text-dark text-decoration-none " href="/users/{{ $user->id }}">
            <div id="users-list" class="container mb-2 mt-3">
                <div class="row col-md-9 col-md-pull-3">
                    <section class="search-result-item">
                        <div class="col search-result-item-body">
                            <div class="row">
                                <div class="col-sm-9 border">
                                    <div class="row">
                                        <div class="col-2">
                                            @if($user->avatar == null)
                                                <ion-avatar>
                                                    <img style="width: 70px;" id="avatar"  alt="Silhouette of a person's head" src="https://ionicframework.com/docs/img/demos/avatar.svg" />
                                                </ion-avatar>
                                            @else
                                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar" style="width: 70px;">
                                            @endif
                                        </div>
                                        <div class="col-10 ml-2">
                                            <h4>
                                                {{ $user->name }}
                                            </h4>
                                            <p>
                                                {{ $user->email }}
                                            </p>
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