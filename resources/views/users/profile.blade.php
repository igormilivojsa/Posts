@php use App\Models\User; @endphp
@extends('layout.app')

@section('content')
    @include('layout.navigation')
        <section id="profile">
            <div style="background-color: #faf9f9" class="container pb-4 py-5 border">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                @if($user->avatar == null)
                                    <ion-avatar>
                                        <img id="avatar" alt="Silhouette of a person's head" src="https://ionicframework.com/docs/img/demos/avatar.svg" />
                                    </ion-avatar>
                                @else
                                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="avatar"
                                        class="img-fluid" style="width: 300px;">
                                @endif
                                <h5 class="my-3">{{ $user->name }}</h5>
                                
                                @if(auth()->id() !== $user->id)
                                    <div class="d-flex justify-content-center mb-2">
                                        <button type="submit" id="follow" onclick="follow({{ $user->id }})"  class="btn btn-secondary">{{ $user->isFollowing() ? 'Unfollow' : 'Follow' }}</button>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Full Name</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $user->name }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-sm-9">
                                            <p class="text-muted mb-0">{{ $user->email }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-3 mb-3">
                            @if( auth()->id() == $user->id)
                                <a href="/users/{{ $user->id }}/edit" class="btn btn-secondary col-2 ">Edit</a>
                            @endif
                        </div>
                        <div class="card mb-4 mb-lg-0">
                            <div class="card">
                                <div class="card-body">
                                    Follows
                                    @foreach($user->follows as $follow)
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <a href="/users/{{ $follow->id }}"><p class="text-muted mb-0">{{ $follow->name }}</p></a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                @if($user->posts !== null)
                                    @foreach($user->posts as $post)
                                        <div id="post" class="container mb-3 border border-1">
                                            @if (pathinfo($post->file, PATHINFO_EXTENSION) === 'mp4')
                                                <video id="post-video" class="mt-3 mb-2" controls>
                                                    <source src="{{ asset('storage/' . $post->file) }}" type="video/mp4">
                                                    <source src="{{ asset('storage/' . $post->file) }}" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            
                                                <div class="container">
                                                    <p >{{ $post->body }}</p>
                                                </div>
                                            @elseif ($post->file == null)
                                                <div class="container">
                                                    <p >{{ $post->body }}</p>
                                                </div>
                                            @else
                                                <img class="mt-3 mb-2" id="post-image" src="{{ asset('storage/' . $post->file) }}" alt="">
                                            
                                                <div class="container">
                                                    <p>{{ $post->body }}</p>
                                                </div>
                                            @endif
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group mb-2">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-hand-thumbs-up"></i></button>
                                                    <button type="button" class="btn btn-sm btn-outline-secondary"><i class="bi bi-hand-thumbs-down"></i></button>
                                                    <a href="/posts/{{ $post->id }}" class="btn btn-outline-secondary"><i class="bi bi-three-dots"></i></a>
                                                </div>
                                                <small class="text-muted"><p>By <b>{{ $post->user->name }}</b> {{ $post->created_at->diffForHumans() }}</p></small>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    User don't have any posts
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection