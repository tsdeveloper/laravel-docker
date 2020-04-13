

<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar">A</span>
            <span class="icon-bar">B</span>
            <span class="icon-bar">C</span>
          </button>
          <a href="{!! url('/') !!}" class="navbar-brand">{{ config('app.name', 'Header') }}</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{!! url('/') !!}">Home</a></li>
          </ul>

          @if (Route::has('login'))
            <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                <li><a href="{{ url('/home') }}">Home</a></li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @endif
            </ul>
          @endif

        </div><!--/.nav-collapse -->
      </div>
    </nav>
<header>
  