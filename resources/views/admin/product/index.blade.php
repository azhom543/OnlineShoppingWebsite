@extends('admin.layout.admin')
@section('content')
    <h3>Products</h3>
    <ul class="container">
        @forelse($products as $product)
            <img src="{{url('images', $product->image)}}" width="100px" height="100px">
            <li>product name: {{$product->name}}</li>
            <li>product price: {{$product->price}}</li>
            <li>product id: {{$product->id}}</li>
            <form action="{{route('product.destroy', $product->id)}}"  method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
             </form>
            @empty
                <h3>NO PRODUCTS</h3>
        @endforelse
    </ul>
@endsection