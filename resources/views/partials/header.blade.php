<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img src="{{url('assets/zozor.png')}}" alt="zozor" class="zozor"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item {{Route::current()->getName() == 'home' ? "active" : ''}}">
          <a class="nav-link" href="{{ route('home')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item {{Route::current()->getName() == 'menu' ? "active" : ''}}">
          <a class="nav-link" href="{{ route('menu') }}">Our Menu</a>
        </li>
        <li class="nav-item {{Route::current()->getName() == 'reservation.create' ? "active" : ''}}">
          <a class="nav-link " href="{{ route('reservation.create') }}">Make Reservation</a>
        </li>
      </ul>
    </div>
    <div class="auth-buttons">
      @if(Auth::check())
      <p>Welcome <strong>{{ Auth::user()->name }}</strong></p>
      <form class="form" method="POST" action="{{route('logout')}}">
        @csrf
        <button class="btn btn-success" type="submit">Logout</button>
      </form>
      @endif
      @if(!Auth::check())
      <a class="btn btn-success" href="{{route('register')}} ">Register</a>
      <a class="btn btn-primary" href="{{route('login')}}">Login</a>
      @endif
    </div>
  </nav>