<div class="container">
    <button id="add-btn" class="btn btn-secondary">+</button>
    
    <form style="display: none" id="form" method="POST" action="{{ route('posts.store') }}">
        @csrf
        
        <div class="mb-3">
            <label for="body" name="body" class="form-label">body</label>
            <textarea class="form-control" id="body" name="body" rows="3"></textarea>
        </div>
        
        <div>
            <button class="btn" type="submit">Add</button>
        </div>
    </form>
</div>
