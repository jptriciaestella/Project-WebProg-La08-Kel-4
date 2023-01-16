@extends('Component.postDetailTemplate')

@section('form')
    @auth
        {{-- ISI FORM COMMENT --}}
        <div class="card text-center d-flex flex-column justify-content-center bg-warning" style="height: auto">
            {{-- ISI FORM KOMENTAR --}}

            <div class="" style="margin: 15px">
                <h4>Insert Comment</h4>
                <br>
                <form enctype="multipart/form-data" action="/insertComment/{{$post->post_id}}" method="POST">
                    @csrf
                    {{-- <input type="textarea" id="comment" name="comment" class="form-control"> --}}
                    <textarea name="comment" type="textarea" class="form-control"  id="comment" required></textarea>
                    <br>
                    {{-- <input type="submit" value="Insert"> --}}
                    <button type="submit" class="btn btn-primary">Insert</button>
                </form>
            </div>
        </div>
    @endauth
@endsection
