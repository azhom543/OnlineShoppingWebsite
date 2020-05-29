<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>
            @yield('title','Creative Store')
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="{{asset('dist/css/foundation.css')}}"/>
        <link rel="stylesheet" href="{{asset('dist/css/app.css')}}"/>
        <link rel="stylesheet" href="{{asset('dist/css/fontawesome-all.min')}}"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    </head>
    <body>
       <div  class="top-bar">
            <div style="color:white" class="top-bar-left">
                <h4 class="brand-title">
                <a href="{{route('shirts')}}">
                        <i class="fa fa-home fa-lg" aria-hidden="true">
                        </i>
                       Creative Store
                    </a>
                </h4>
            </div>
            <div class="top-bar-right">
                <ol class="menu">
                    <li>
                        <a href="#">
                            SHIRTS
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sendemail') }}">
                            CONTACT
                        </a>
                    </li>
                    <li>
                            <a class="dropdown-item" href="{{ route('user.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                        
                            <form id="logout-form" action="{{ route('user.logout') }}" method="GET" style="display: none;">
                                @csrf
                            </form>
                            
                    </li>
                    

                    <li>
                    <a href="{{route('cart.index')}}">
                            <i class="fa fa-shopping-cart fa-2x" aria-hidden="true">
                            </i>
                            CART
                            <span class="alert badge">
                                8
                            </span>
                        </a>
                    </li>
                </ol>
            </div>
        </div>

        <!-- products listing -->
         <!-- Latest SHirts -->
        <div class="row">
            @forelse ($shirts as $shirt)
            <div class="small-3 columns">
                <div class="item-wrapper">
                    <div class="img-wrapper">
                    <a href="{{route('cart.add', $shirt->id)}}" class="button expanded add-to-cart">
                            Add to Cart
                        </a>
                        <a href="#">
                        <img src="{{url('images', $shirt->image)}}"/>
                        </a>
                    </div>
                    <a href={{route('shirt')}}>
                        <h3>
                            {{$shirt->name}}
                        </h3>
                    </a>
                    <h5>
                        ${{$shirt->price}}
                    </h5>
                    <p>
                        {{$shirt->description}}
                    </p>
                </div>
            </div>
            @empty
                <h3>NO PRODUCTS</h3>
            @endforelse
            
        </div>
        <div class="di7">
            <div class="di7d">
                <div class="sec4">
                    <h4 class="sec4h4">Multi</h4>
                    <p class="sec4p1">In a elit in lorem congue varius. Sed nec arcu. Etiam sit amet<br>augue. Fusce fermen tum neque a rutrum varius odio<br>pede ullamcorp-er tellus ut dignissim nisi risus non tortor.<br>Aliquam mollis neque.</p>
                    <i class="fa fa-facebook a" aria-hidden="true"></i>


                    <i class="fa fa-google a" aria-hidden="true"></i>

                    <i class="fa fa-github-alt a" aria-hidden="true"></i>

                    <i class="fa fa-twitter a" aria-hidden="true"></i>

                    <i class="fa fa-home fa-lg a" aria-hidden="true">
                    </i>
                </div>
                <div class="sec4">
                    <h4 class="sec4h4">RECENT POSTS</h4>
                    <p class="sec4p2">Awesome Design with Overviews</p><hr>
                    <p class="sec4p2">Great Design with Features</p><hr>
                    <p class="sec4p2">Limitless functions &amp; Works</p><hr>
                    <p class="sec4p2">Multi is simple and clean design</p>
                </div>
                <div class="sec4">
                    <h4 class="sec4h4">CONTACT INFO</h4>
                    <div class="sec4d">
                        <i class="fa fa-home fa-lg" aria-hidden="true" style="float: left; font-size: 25px;">
                        </i>
                        <p class="sec4p2">Office # 38, Suite 54 Elizebth Street, Victoria State Newyork, USA 33026</p>
                    </div><hr>
                    <div class="sec4d">
                        <i class="fa fa-whatsapp" aria-hidden="true" style="float: left; font-size: 25px;"></i>
                        <p class="sec4p2">+38 000 129900</p>
                    </div><hr>
                    <div class="sec4d">
                        <i class="fa fa-home fa-lg" aria-hidden="true" style="float: left; font-size: 25px;">
                        </i>
                        <p class="sec4p2">info@domain.net</p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="foot">
            <ul class="ful">
                <li class="foli">© All Rights Reserved. By <span>BootstrapMade</span></li>
                        <li class="fli">Home</li>
                        <li class="fli">Services</li>
                        <li class="fli">Blog</li>
                        <li class="fli">Portfolio</li>
                        <li class="fli">Contact</li>
            </ul>
        
        </footer>  
        <script src="{{asset('dist/js/fontawesome-all.min')}}"></script>
</body>
</html>
