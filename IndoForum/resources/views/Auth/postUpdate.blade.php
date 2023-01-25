@extends('post')

@section('method')
    method="POST"
@endsection

@section('method_field')
    @method('PUT')
@endsection

@section('action')
    action='/updateData/{{$post -> post_id}}'
@endsection

@section('Judul')
    <p id="title" class="d-flex flex-column align-items-center mt-4 fs-1 fw-bold">Update Post</p>
@endsection

@section('titleValue')
    value = '{{$post -> title}}'
@endsection

@section('contentValue')
    {{$post -> content}}
@endsection

@section('submit_button')
    <button type="submit" class="btn btn-primary">Update</button>
@endsection
