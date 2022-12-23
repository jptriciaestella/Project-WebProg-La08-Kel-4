@extends('Component.navbar')

@section('document_title', $post->title)

@section('body')
    <div class="m-5"></div>
    <div class="card bg-light">
        <div class="card-header">
            <h1 class="card-title">{{$post->title}}</h1>
        </div>

        <div class="card-body">
            <h5 class="fw-normal">Oleh:
                <a href="/profile/{{$post->username}}">{{$post->username}}</a> , dibuat pada: {{$post->created_at}}</h5>

            <div class="d-flex">
                @if ($post->image !== 'images/no-image.jpg')
                    <img src="{{('/storage/').$post->image}}" class="rounded mx-3 my-3 d-block" style="max-height: 500px; object-fit:cover" alt="">
                @endif
                <div class="my-5"></div>
                <p class="d-block my-3 px-3">
                    {{$post->content}}
                </p>
            </div>
        </div>

    </div>
    <div class="m-5"></div>
    <hr>
    <h2 class="my-5">Komentar:</h2>
    @yield('form')
    <div class="m-5"></div>

    @if ($comments->count() > 0)
        @foreach ($comments as $comment)
            @include('Component.commentThumbnail')
        @endforeach
    @else
        <p>Belum ada komentar..</p>
    @endif

    <div class="nav d-flex justify-content-center m-5">
        {{$comments->withQueryString()}}
    </div>

@endsection




