@extends('Component.postDetailTemplate')

@section('form')
    @auth
        {{-- ISI FORM COMMENT --}}
        <div class="card text-center d-flex flex-column justify-content-center bg-warning" style="height: 150px">ISI FORM EDIT KOMENTAR</div>
    @endauth
@endsection
