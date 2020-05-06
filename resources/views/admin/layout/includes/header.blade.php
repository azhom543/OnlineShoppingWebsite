<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <!-- Logo -->
                <div class="logo">
                    <h1><a href="{{route('admin.dashboard')}}">Admin</a></h1>
                </div>
            </div>

            <div class="col-md-2 pull-right">
                <div class="navbar navbar-inverse" role="banner">
                    <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="{{url('/')}}" class="dropdown-toggle" data-toggle="dropdown">My Site <b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu animated fadeInUp">
                                    <li><a href="{{route('shirts')}}">Front End</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                                         {{ __('Logout') }}
                                     </a></li>
                                 
                                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                         @csrf
                                     </form>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>