@extends('Component.navbar')

@section('document_title', $post->title)

@section('body')
    <div class="m-5"></div>
    <div class="card bg-light">
        <div class="card-header">
            <h1 class="card-title">{{$post->title}}</h1>
        </div>

        <div class="card-body">
            <h5 class="fw-normal">Oleh: {{$post->username}}, dibuat pada: {{$post->created_at}}</h5>

            <div class="d-flex">
                @if ($post->image !== 'images/no-image.jpg')
                    <img src="{{('/storage/').$post->image}}" class="rounded mx-auto d-block my-3" width="40%" alt="">
                @endif
                <p>
                    {{$post->content}}
                </p>
            </div>


        </div>

    </div>
    @yield('form')
@endsection




