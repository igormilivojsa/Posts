<div class="container" id="form">
    <button id="add-btn" class="btn btn-secondary mb-5">+</button>
    
    <form style="display: none" id="form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="body" name="body" class="form-label">body</label>
            <textarea required class="form-control" id="body" name="body" rows="3"></textarea>
            
            <div class="input-group mb-3">
                <input type="file" class="form-control mt-3" name="file" id="input">
            </div>
        </div>  
        
        <div>
            <button class="btn btn-outline-dark" type="submit">Add</button>
        </div>
    </form>
</div>
