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

    <h2 class="my-5">Profil Member</h2>

    @if ($user->id == Auth::user()->id)
        <h5 class="font-weight-normal">Halo, <b>{{$user->username}}</b>!</h5 class="font-weight-normal">
        <h5 class="font-weight-normal"><b>Email:</b> {{$user->email}}</h5 class="font-weight-normal">
        <h5 class="font-weight-normal"><b>Bergabung sejak:</b> {{$user->created_at}}</h5 class="font-weight-normal">

        <div class="d-flex my-5 flex-wrap">
            @if(Auth::user()->role == 'member')
                <a href="/edit-password" class="btn btn-outline-primary my-1" style="width: 250px; margin-right:50px">Ubah Password</a>
            @endif
            <form action="/sign-out" method="GET">
                <input type="submit" value="Signout" class="btn btn-outline-danger my-1" style="width: 250px">
            </form>
        </div>

        <hr>
        <h2 class="my-5">Postingan anda:</h2>
        @if ($posts->count() == 0)
            <h5 class="my-5 text-muted font-weight-normal">Belum ada postingan dari kamu. Ayo buat postingan pertamamu!</h5>
        @endif
    @else
        <h5 class="font-weight-normal"><b>Username:</b> {{$user->username}}</h5 class="font-weight-normal">
        <h5 class="font-weight-normal"><b>Email:</b> {{$user->email}}</h5 class="font-weight-normal">
        <h5 class="font-weight-normal"><b>Bergabung sejak:</b> {{$user->created_at}}</h5 class="font-weight-normal">

        <hr>
        <h2 class="my-5">Postingan dari user ini:</h2>
        @if ($posts->count() == 0)
            <h5 class="my-5 text-muted font-weight-normal">Belum ada postingan dari user ini.</h5>
        @endif
    @endif

    @foreach ($posts as $post)
        @include('Component.postThumbnail')
    @endforeach

    <div class="nav d-flex justify-content-center m-5">
        {{$posts->withQueryString()}}
    </div>

@endsection
