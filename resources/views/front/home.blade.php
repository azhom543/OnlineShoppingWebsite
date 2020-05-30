@extends('layouts.main')

@section('content')




    <section class="hero text-center">
        <br/>
        <br/>
        <br/>
        <br/>
        <h2>
            <strong>
                Hey! Welcome to Creative Store
            </strong>
        </h2>
        <br>
        <a href="{{route('shirts')}}">
            <button class="button large">Check out The Products</button>
        </a>
    </section>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src = "{{asset('images/first.jpg') }}" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/second.jpg') }}" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/third.jpg') }}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="false"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


    <br/>
    <div class="subheader text-center">
        <h2>
            Creative Store&rsquo;s Latest Products
        </h2>
    </div>

    <!-- Latest SHirts -->
    <div class="row">
        @forelse ($shirts as $shirt)
        <div class="small-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                <a href="{{route('cart.edit', $shirt->id)}}" class="button expanded add-to-cart">
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

    <!-- Footer -->
    <br>
@endsection