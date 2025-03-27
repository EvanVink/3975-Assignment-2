@if (!isset($displayNav) || $displayNav)
<header>
    <nav class="navbar">
        <div class="nav-container">
            <a class="navbar-brand" href="{{ session('role') == 'admin' ? url('/admin/admin_page') : url('/') }}">
                <span class="blog-title">THE BLOG</span>
            </a>

            <ul class="nav-menu">
                @if (session('role') == 'admin')
                    <li><a href="{{ url('/admin/admin_page') }}">User List</a></li>
                @endif
                <li><a href="{{ url('/') }}">Articles</a></li>
                <li><a href="{{ url('/User/createArticle') }}">Create Article</a></li>
                <li><a href="{{ url('/User/profile') }}">Profile</a></li>
                <li><a href="{{ url('/User/logout') }}">Logout</a></li>
            </ul>
        </div>
    </nav>
</header>
@endif
