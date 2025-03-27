<header>
    <nav class="navbar">
        <div class="nav-container">

            @auth

                {{-- If user is an admin, route to adminPage when click logo --}}
                @if(Auth::user()->role == 'admin')

                    <!-- Might need to change route depending on how route defined in routes/web.php-->
                    <a class="navbar-brand" href="{{ route('admin.adminPage')}}">
                        <span class="blog-title">THE BLOG</span>
                    </a>
                
                {{-- If user is a user, route to article when click logo   --}}
                @else
                    
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <span class="blog-title">THE BLOG</span>
                    </a>

            @endauth

            <ul class="nav=menu">

                @auth

                @if(Auth::user()->role == 'admin')

                    <li><a href="{{ route('admin.users') }}">User List</a></li>
                    <li><a href="{{ route('articles.index') }}">Articles</a></li>
                    <li><a href="{{ route('articles.create') }}">Create Article</a></li>
                    <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>

                @else

                    <li><a href="{{ route('articles.index') }}">Articles</a></li>
                    <li><a href="{{ route('articles.create') }}">Create Article</a></li>
                    <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                        </form>
                    </li>

                @endif
                
            @else
                <!-- Guest Navigation -->
                <li><a href="{{ config('app.react_url') }}">Articles</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Sign Up</a></li>
            @endauth

            </ul>

        <div>
    </nav>
</header>