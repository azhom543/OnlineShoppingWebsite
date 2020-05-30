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
                        <a href="{{route('shirts')}}">
                            Return Home
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
                </ol>
            </div>
        </div>
    <div class="row">
        <h3>Cart Items</h3>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>size</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($cartitems as $cartitem)
                <tr>
                    <td>{{$cartitem->Productname}}</td>
                    <td>${{$cartitem->Price}}</td>
                <td>
                    <div > {!! Form::select('size', ['small'=>'Small','medium'=>'Medium','large'=>'Large']) !!}
                    </div>
                </td>
                <td>
                    <input style="float: left"  type="submit" class="button success small" value="Ok">
                    {!! Form::close() !!}
                    <form action="{{route('cart.destroy',$cartitem->id)}}"  method="POST">
                       {{csrf_field()}}
                       {{method_field('DELETE')}}
                       <input class="button small alert" type="submit" value="Delete">
                     </form>
                </td>
            </tr>
            @empty
                <li>No Items</li>
            @endforelse
            </tbody>
        </table>
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