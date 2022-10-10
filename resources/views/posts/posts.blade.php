@foreach($posts as $post)
    <div class="card shadow-sm mt-2">
        <div class="card-body">
            <p class="card-text">{{ $post->body }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Like</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Dislike</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">More</button>
                </div>
                
                <small class="text-muted">By {{ $post->created_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
@endforeach