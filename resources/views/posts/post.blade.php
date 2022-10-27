@extends('layout.app')

@section('content')
    @if(Auth::user())
        @include('layout.navigation')
    @else
        @include('layout.guest-navigation')
    @endif
    <div id="post" class="container mb-3 border border-1 shadow">
        @if (pathinfo($post->file, PATHINFO_EXTENSION) === 'mp4')
            <video id="post-video" class="mt-3" controls>
                <source src="{{ asset('storage/' . $post->file) }}" type="video/mp4">
                <source src="{{ asset('storage/' . $post->file) }}" type="video/ogg">
                Your browser does not support the video tag.
            </video>
        @else
            <img class="mt-3" id="post-image" src="{{ asset('storage/' . $post->file) }}" alt="">
        @endif
        <div class="container">
            <p id="kamen">{{ $post->body }}</p>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-secondary"><i class="fa-solid fa-comment-dots"></i></button>
                <button type="button" class="btn btn-sm btn-outline-secondary"></button>
            </div>
            <small class="text-muted"><p>By <b>{{ $post->user->name }}</b> {{ $post->created_at->diffForHumans() }}</p></small>
        </div>
        <hr>
        <h5 class="mb-3">Comments:</h5>
            @if (Auth::user())
                <form class="mt-4" method="POST" action="{{ route('comments.store', ['post' => $post->id]) }}">
                    @csrf
                    
                    <div class="form-floating">
                        <textarea class="form-control" name="body" maxlength="23" placeholder="Leave a comment here" id="comment-body"></textarea>
                        <label for="floatingTextarea">Add comment</label>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-dark" type="submit">Add</button>
                    </div>
                </form>
            @else
                <p>
                    <b>
                        login to comment
                    </b>
                </p>
            @endif
        <div>
            @foreach($post->comments as $comment)
                <div class="border mb-1 pb-1">
                    <div class="container mb-3">
                        <p>{{$comment->body}}</p>
                    </div>
    
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group mb-2" hidden>
                        </div>
                        <small class="text-muted"><p>By <b>{{ $comment->user->name }}</b> {{ $comment->created_at->diffForHumans() }}</p></small>
                    </div>
                </div>
                
            @endforeach
        </div>
    </div>
@endsection