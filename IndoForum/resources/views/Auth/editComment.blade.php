@extends('Component.postDetailTemplate')

@section('form')
    @auth
        {{-- ISI FORM COMMENT --}}
        <div class="card text-center d-flex flex-column justify-content-center bg-warning" style="height: auto">
            <div class="" style="margin: 15px">
                <h4>Edit Comment</h4>
                <br>
                <form enctype="multipart/form-data" action="/insertComment/{{$post->post_id}}" method="POST">
                    @csrf

                    <textarea name="comment" type="textarea" class="form-control"  id="comment" required>{{$comment -> comment}}</textarea>
                    <br>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    @endauth
@endsection

