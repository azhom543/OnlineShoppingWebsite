@extends('admin.layout.admin')
@section('content')
    <h3>Users</h3>
    <ul class="container">
        @forelse($users as $user)
            <li>user name: {{$user->name}}</li>
            <li>user email: {{$user->email}}</li>
            <li>user id: {{$user->id}}</li>
            <form action="{{route('user.delete', $user->id)}}"  method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input class="btn btn-sm btn-danger" type="submit" value="Delete">
             </form>
            @empty
                <h3>No Users</h3>
        @endforelse
    </ul>
@endsection