@extends('Component.postDetailTemplate')

@section('form')
    @auth
        {{-- ISI FORM COMMENT --}}
        <div class="card text-center d-flex flex-column justify-content-center bg-warning" style="height: auto">
            {{-- ISI FORM KOMENTAR --}}

            <div class="" style="margin: 15px">
                <h5>Insert Comment</h5>
                <form enctype="multipart/form-data" action="/insertComment/{{$post->post_id}}" method="POST">
                    @csrf
                    <input type="text" id="comment" name="comment" class="form-control">
                    <br>
                    <input type="submit" value="Insert">
                </form>
            </div>
        </div>
    @endauth
@endsection
