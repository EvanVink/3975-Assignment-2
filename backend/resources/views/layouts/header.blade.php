<header>
    <nav class="navbar">

        <div class="nav-container">

            {{-- The part below this line, changes the route when logo is clicked, depending on user status. --}}
            @auth
            
                {{-- For admin --}}
                @if(Auth::user()->role == 'admin')
                    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                        <span class="blog-title">THE BLOG</span>
                    </a>

                {{-- For logged-in user --}}
                @else
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span class="blog-title">THE BLOG</span>
                    </a>
                @endif

            {{-- For public side (Non logged-in user) --}}
            @else
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="blog-title">THE BLOG</span>
                </a>
            @endauth
                
            {{-- The parts below this line, changes navbar contents depending on user status. --}}
            <ul class="nav-menu">

                @if(Auth::check())

                    {{-- For admin --}}
                    @if(Auth::user()->role == 'admin')

                        <li><a href="{{ route('admin.users') }}">User List</a></li>
                        <li><a href="{{ route('view.articles') }}">Articles</a></li>
                        <li><a href="{{ route('articles.create') }}">Create Article</a></li>
                        <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>

                        </li>

                    {{-- For logged-in user --}}
                    @else

                        <li><a href="{{ route('view.articles') }}">Articles</a></li>
                        <li><a href="{{ route('articles.create') }}">Create Article</a></li>
                        <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                        <li>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>

                        </li>

                    @endif

                {{-- For public side (Non logged-in user and admin) --}}
                @else

                    <li><a href="{{ route('view.articles') }}">Articles</a></li>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Sign Up</a></li>

                @endif
            </ul>
        </div>
    </nav>
</header>