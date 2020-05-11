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
        <link rel="stylesheet" href="dist/css/foundation.css"/>
        <link rel="stylesheet" href="dist/css/app.css"/>
    </head>
    <body>
       <div  class="top-bar">
            <div style="color:white" class="top-bar-left">
                <h4 class="brand-title">
                    <a href="index.html">
                        <i class="fa fa-home fa-lg" aria-hidden="true">
                        </i>
                       MC-MyKey Shirts
                    </a>
                </h4>
            </div>
            <div class="top-bar-right">
                <ol class="menu">
                    <li>
                        <a href="shirts.html">
                            SHIRTS
                        </a>
                    </li>
                    <li>
                        <a href="#">
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
                        <a href="#">
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
                        <a class="button expanded add-to-cart">
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
                        {{$shirt->price}}
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
</body>
</html>
