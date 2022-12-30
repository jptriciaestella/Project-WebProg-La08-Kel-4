@extends('Component.postDetailTemplate')

@section('form')
    @auth
        {{-- ISI FORM COMMENT --}}
        <div class="card text-center d-flex flex-column justify-content-center bg-warning" style="height: 150px">ISI FORM EDIT KOMENTAR</div>
        <div class="container w-50">
            <form class="form" action="/edit-comment" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="m-5"></div>
                <h1 class="mb-3 font-weight-normal text-center mb-5"></h1>

                <label for="AddComment" class="h5">Add new commment</label>
                <input name="AddComment" class="form-control-file" type="file" id="comment" placeholder="(5-20 letters)">

                @if ($errors->any())
                    <p class="mt-5 text-danger">{{$errors->first()}}</p>
                @endif

                <input type="submit" class="btn btn-lg btn-primary btn-block my-5" value="Add">

                <div class="m-5 p-5"></div>
            </form>
        </div>
    @endauth
@endsection
