@foreach($posts as $post)
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
                <a href="posts/{{ $post->id }}" class="btn btn-outline">vise</a>
            </div>
            <small class="text-muted"><p>By <b>{{ $post->user->name }}</b> {{ $post->created_at->diffForHumans() }}</p></small>
        </div>
    </div>
@endforeach