<header class="p-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>
                    <a href="/posts" class="nav-link btn btn-outline-dark-light text-black px-2 mr-2 ml-2">Home</a>
                </li>
                <li>
                    <a href="/users" class="nav-link btn btn-outline-dark-light text-black px-2 mr-2 ml-2">Search users</a>
                </li>
                <li>
                    <a href="/liked" class="nav-link btn btn-outline-dark-light text-black px-2 mr-2 ml-2">Liked posts</a>
                </li>
                <li>
                    <a href="/user" class="nav-link btn btn-outline-dark-light text-black px-2 mr-2 ml-2">Profile</a>
                </li>
            </ul>
            
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
            
            <div class="text-end">
                
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-light me-2">
                            {{ Auth::user()->name }}
                        </button>
                    </form>
                
            </div>
        </div>
    </div>
</header>