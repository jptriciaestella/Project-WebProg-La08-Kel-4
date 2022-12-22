@extends('Component.navbar')

@section('document_title', 'IndoForum')

@section('body')
    <div class="m-5"></div>

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>{{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <h2>Profile</h2>
    <div class="m-5"></div>

    @if ($user->id == Auth::user()->id)
        <h6>Halo, {{$user->username}}</h6>
        @if(Auth::user()->role == 'member')
            <a href="/edit-password" class="btn btn-outline-primary">Edit Password</a>
        @endif
        <form action="/sign-out" method="GET">
            <input type="submit" value="Signout" class="btn btn-outline-danger my-2 my-sm-0">
        </form>
    @else
        <h6>Username: {{$user->username}}</h6>
        <h6>Email: {{$user->email}}</h6>
        <h6>Bergabung sejak: {{$user->created_at}}</h6>
    @endif

    @foreach ($posts as $post)
        <h2>{{$post->title}}</h2>
    @endforeach

@endsection
