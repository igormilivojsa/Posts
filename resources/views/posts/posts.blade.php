@foreach($posts as $post)
    <div id="post" class="container mb-3 border border-1 shadow">
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
                @dd($post->likes)
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-hand-thumbs-up"></i>{{ $post->liked ?: 0}}
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-hand-thumbs-down"></i>{{ $post->disliked ?: 0}}
                </button>
                <a href="posts/{{ $post->id }}" class="btn btn-outline-secondary">
                    <i class="bi bi-three-dots"></i>
                </a>
            </div>
                <small class="text-muted"><p>By <b>{{ $post->user->name }}</b> {{ $post->created_at->diffForHumans() }}</p></small>
        </div>
    </div>
@endforeach