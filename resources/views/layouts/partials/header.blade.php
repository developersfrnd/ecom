<!-- Navbar -->
<nav class="navbar navbar-expand-sm">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
      <img src="{{ asset('assets/images') }}/logo.png" alt="logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon fa fa-navicon"></span>
    </button>

    <div class="collapse navbar-collapse flex-column justify-content-end" id="navbarSupportedContent">
      <form method="get" action="{{ url('/search') }}">
        <ul class="navbar-nav mb-3 align-items-center justify-content-end">
          <li class="nav-item">
            <input type="text" placeholder="Search" class="form-control" name="q">
            <i class="fa fa-search"></i>
          </li>
          <li class="nav-item">
            <a href="{{ url('/lang/en') }}"><img src="{{ asset('assets/images') }}/lang1.jpg" alt="EN"></a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/lang/he') }}"><img src="{{ asset('assets/images') }}/lang2.jpg" alt="HE"></a>
          </li>
        </ul>
      </form>
      <ul class="navbar-nav justify-content-end">
        <li class="nav-item <?php echo (Request::path()=='/') ? 'active' : '' ?>">
          <a class="nav-link" href="{{ url('/') }}">{{__('header.home')}}</a>
        </li>
        <li class="nav-item <?php echo (Request::path()=='login') ? 'active' : '' ?>">
        @if(Auth::user())
          <a class="nav-link" href="{{ route('signout') }}">{{__('header.logout')}}</a>
        @else
          <a class="nav-link" href="{{ url('/login') }}">{{__('header.login')}}</a>
        @endif  
        </li>
        @if(Auth::user())
        <li class="nav-item <?php echo (Request::path()=='about') ? 'active' : '' ?>">
          <a class="nav-link" href="{{ url('/projects') }}">{{__('header.projects')}}</a>
        </li>
        @endif
        <li class="nav-item <?php echo (Request::path()=='about') ? 'active' : '' ?>">
          <a class="nav-link" href="{{ url('/about') }}">{{__('header.about_us')}}</a>
        </li>
        <li class="nav-item <?php echo (Request::path()=='contact') ? 'active' : '' ?>">
          <a class="nav-link" href="javascript:void(0)">{{__('header.contact_us')}}</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Navbar End -->