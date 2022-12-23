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

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong>{{Session::get('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @foreach ($posts as $post)
        @include('Component.postThumbnail')
    @endforeach

    <div class="nav d-flex justify-content-center m-5">
        {{$posts->withQueryString()}}
    </div>

@endsection
