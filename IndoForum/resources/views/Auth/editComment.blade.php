@extends('Component.postDetailTemplate')

@section('form')
    @auth
        <div class="card text-center d-flex flex-column justify-content-center bg-warning" style="height: auto">
            <div class="" style="margin: 15px">
                <h4 style="text-align: left">Edit Comment</h4>
                <br>
                <form enctype="multipart/form-data" action="/updateCommentData/{{$post->post_id}}/{{$comment->comment_id}}" method="POST">
                    {{method_field('PUT')}}
                    @csrf
                    <textarea name="comment" type="textarea" class="form-control"  id="comment" required>{{$comment -> comment}}</textarea>
                    <br>
                    <button type="submit" class="btn btn-primary" style="margin-left: 1140px">Update</button>
                </form>
            </div>
        </div>
    @endauth
@endsection

