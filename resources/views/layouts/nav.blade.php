<div class="blog-masthead">
  <div class="container">
    <nav class="nav blog-nav">
      @if (auth()->check())
        @if (auth()->user()->isAdmin())
          <a class="nav-link" href="/roles/admin">Admin Dashboard</a>
        @endif
      @endif
      @if (auth()->check())
        @if (auth()->user()->isUser())
          <a class="nav-link" href="/roles/user">User Homepage</a>
        @endif
      @endif
      <a class="nav-link " href="/posts">Home</a>
      <a class="nav-link" href="/tasks">Tasks</a>
      @if (Auth::guest())
      <a class="nav-link ml-auto" href="/login">Login</a>
      <a class="nav-link ml-right" href="/register">Register</a>
      @endif
      @if(Auth::check())
      <a class="nav-link" href="/posts/create">Create Post</a>
      <a class="nav-link ml-auto" href="#">{{ Auth::user()->name }}</a>
      <a class="nav-link ml-right" href="/logout" style="color: #a2b223">Logout</a>
      @endif
    </nav>
  </div>
</div>