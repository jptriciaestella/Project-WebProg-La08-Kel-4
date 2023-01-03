@extends('Component.navbar')

@section('document_title', 'IndoForum')

@section('body')
    <div class="m-5"></div>

    <div class="d-flex justify-content-between">
        @if ($active == 'Semua')
            <h2>Telusuri semua postingan terbaru </h2>
        @else
            <h2>Telusuri postingan terbaru di kategori {{$active}}</h2>
        @endif
        <div class="dropdown">
            <a class="btn btn-dark dropdown-toggle px-5" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih kategori
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li>
                <a class="dropdown-item @if ($active == 'Semua') active @endif" href="/">Semua</a>
                @foreach ($categories as $category)
                    <a class="dropdown-item @if ($active == $category->name) active @endif" href="/category/{{$category->id}}">{{$category->name}}</a>
                @endforeach
                </li>
            </ul>
        </div>
    </div>

    <div class="m-5"></div>
    <hr>
    <div class="m-5"></div>

    {{-- @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>{{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif --}}

    <div id="informasi">
        @if(session()->has('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('sukses')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>

    @foreach ($posts as $post)
        @include('Component.postThumbnail')
    @endforeach

    <div class="nav d-flex justify-content-center m-5">
        {{$posts->withQueryString()}}
    </div>

    <div class="position-fixed bottom-0 end-0 m-5">
        {{-- GANTI HREF --}}
        <a href="/createPost" class="btn btn-warning rounded-circle p-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="white" class="bi bi-plus-lg" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
            </svg>
        </a>
    </div>

@endsection
