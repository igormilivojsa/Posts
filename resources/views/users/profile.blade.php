@extends('layout.app')

@section('content')
    @include('layout.navigation')

    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                
                
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                                 class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ Auth::user()->name }}</h5>
                            <div class="d-flex justify-content-center mb-2">
                                <button type="button" class="btn btn-primary">Follow</button>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4 mb-lg-0">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-12">
                            @if (Auth::user()->posts)
                                @foreach(Auth::user()->posts as $post)
                                <div id="post" class="container mb-3 border border-1 shadow">
                                    @if (pathinfo($post->file, PATHINFO_EXTENSION) === 'mp4')
                                        <video id="post-video" class="mt-3 mb-2" controls>
                                            <source src="{{ asset('storage/' . $post->file) }}" type="video/mp4">
                                            <source src="{{ asset('storage/' . $post->file) }}" type="video/ogg">
                                            Your browser does not support the video tag.
                                        </video>
                
                                        <div class="container">
                                            <p id="kamen">{{ $post->body }}</p>
                                        </div>
                                    @elseif ($post->file == null)
                                        <div class="container">
                                            <p id="kamen">{{ $post->body }}</p>
                                        </div>
                                    @else
                                        <img class="mt-3 mb-2" id="post-image" src="{{ asset('storage/' . $post->file) }}" alt="">
                
                                        <div class="container">
                                            <p id="kamen">{{ $post->body }}</p>
                                        </div>
                                    @endif
            
            
            
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group mb-2">
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-comment-dots"></i></button>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"></button>
                                            <a href="posts/{{ $post->id }}" class="btn btn-outline-secondary">vise</a>
                                        </div>
                                        <small class="text-muted"><p>By <b>{{ $post->user->name }}</b> {{ $post->created_at->diffForHumans() }}</p></small>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection