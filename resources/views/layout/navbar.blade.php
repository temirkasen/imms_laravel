<nav class="navbar-expand-lg navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="{{url('/home')}}">Analysts</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle @if(isset($have_more) && $have_more) text-success @endif" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Questionnaire @if(isset($have_more) && $have_more) <div class="badge badge-light">{{$have_more}}</div> @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
{{--                    @if(Auth::user()->isAdmin)--}}
{{--                        <a class="dropdown-item @if(isset($have_more) && $have_more)bg-success @endif" href="{{ route('admin.questionary.all') }}">Active @if(isset($have_more) && $have_more) <span class="badge badge-light">{{$have_more}}</span> @endif</a>--}}
{{--                        <a class="dropdown-item disabled" href="{{ url('/questionary/answered') }}" >Answered</a>--}}
{{--                    @elseif(Auth::user())--}}
                    <a class="dropdown-item @if(isset($have_more) && $have_more)bg-success @endif" href="{{ route('customer.questionary.active') }}">Active @if(isset($have_more) && $have_more) <span class="badge badge-light">{{$have_more}}</span> @endif</a>
                    <a class="dropdown-item disabled" href="{{ url('/questionary/answered') }}" >Answered</a>
{{--                    @endif--}}
                </div>
            </li>
            @stack('nav_items')
        </ul>
        <form class="form-inline my-2 my-lg-0 ">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" disabled>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" disabled>Search</button>
        </form>
    </div>
</nav>
