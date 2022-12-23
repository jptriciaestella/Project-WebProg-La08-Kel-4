@extends('Component.navbar')

@section('document_title', 'IndoForum')

@section('body')
    <div class="m-5"></div>

    <div class="d-flex justify-content-between">

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
