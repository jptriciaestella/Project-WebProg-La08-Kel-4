@extends('Component.postDetailTemplate')

@section('form')
    @auth
        <div class="card text-center d-flex flex-column justify-content-center bg-warning" style="height: auto">
            <div class="" style="margin: 15px">
                <h4 style="text-align: left">Insert Comment</h4>
                <br>
                <form enctype="multipart/form-data" action="/insertComment/{{$post->post_id}}" method="POST">
                    @csrf
                    <textarea name="comment" type="textarea" class="form-control"  id="comment" required></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary" style="margin-left: 1140px">Insert</button>
                </form>
            </div>
        </div>
    @endauth
@endsection
