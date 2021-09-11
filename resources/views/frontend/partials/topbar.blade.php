<div class="top-bar">
  <div class="container">
    <div class="row d-flex justify-content-between">
      <div class="topbar-left">
        <ul>
          <li><a href="{{route('faq')}}"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
          <li><a href="javascript:;"><i class="fa fa-envelope-o"></i>info@globalskills.com.bd</a></li>
        </ul>
      </div>
      <div class="topbar-right">
        <ul>

          @guest
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else
              <li class="nav-item">
                {{ Auth::user()->name }}



              </li>
              <li><a class="btn btn-light" href="{{route('user_profile')}}">Dashboard</a></li>

              <li>
                  <a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </li>

          @endguest
        </ul>
      </div>
    </div>
  </div>
</div>
