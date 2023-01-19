<div class="flex">
    <form method="POST" action="{{ route('likes.store' , ['post' => $post->id]) }}">
        @csrf
        
        <div class="flex items-center mr-4">
            <button type="submit" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-hand-thumbs-up"></i>{{ $post->likes ?: 0 }}
            </button>
        </div>
    </form>
    
    <form method="POST" action="{{ route('likes.destroy' , [ $post->id]) }}">
        @csrf
        
        <div class="flex items-center">
            <button type="submit" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-hand-thumbs-down"></i>{{ $post->dislikes ?: 0 }}
            </button>
        </div>
    </form>
</div>

{{--<button type="button" onclick="like()" class="btn btn-sm btn-outline-secondary">--}}
{{--    <i class="bi bi-hand-thumbs-up"></i>{{ $post->likes }}--}}
{{--</button>--}}
{{--<button type="button" class="btn btn-sm btn-outline-secondary">--}}
{{--    <i class="bi bi-hand-thumbs-down"></i>{{ $post->dislikes}}--}}
{{--</button>--}}

{{--btn onclick like() -> ajax -> controller -> blade--}}