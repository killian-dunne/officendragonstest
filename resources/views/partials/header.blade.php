<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light ">
  <div class="container-fluid">
    <a href="/"><img src="{{ asset('src/images/icon.png') }}" alt="Office & Dragons"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Auth::check())
              <div class="dropdown-item" href="#">Logged in.</div>
              <a class="dropdown-item" href="{{ route('user.logout') }}">Log out</a>
            @else 
              <a class="dropdown-item" href="{{ route('user.signin') }}">Sign in</a>
              <a class="dropdown-item" href="{{ route('user.signup') }}">Sign up</a>
            @endif
          </div>
        </li>
      </ul>

      @if(Auth::check()) 
        <button class="btn btn-primary">Add Company</button>
      @else
        <button class="btn btn-primary" disabled>Add Company</button>
      @endif
    </div>
  </div>
</nav>