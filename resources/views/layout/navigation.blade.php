<header class="p-3 border-bottom">
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
                    <a href="/users/{{ Auth::user()->id }}" class="nav-link btn btn-outline-dark-light text-black px-2 mr-2 ml-2">Profile</a>
                </li>
            </ul>
            
            <div class="btn-group">
                <button type="button" class="btn btn-outline dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu">
                    <li id="logout-li" class="dropdown-item">
                        <form id="logout" method="POST" action="{{ route('logout') }}">
                            @csrf
                            logout
                        </form>
                    </li>
                    <li class="dropdown-item">
                        <a class="link" href="#">
                            Another action
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>