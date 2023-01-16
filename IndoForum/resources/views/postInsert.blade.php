@extends('post')

@section('method')
    method = "POST"
@endsection

@section('action')
    action = "/insertData"
@endsection

@section('Judul')
    <p id="title" class="d-flex flex-column align-items-center mt-4 fs-1 fw-bold">Create Post</p>
@endsection

@section('gambar')
    <div class="mb-3" id="gambar">
        <label for="image" class="form-label">Image</label>
        <input name="image" class="form-control" @error('image') is-invalid @enderror type="file" id="image">

        @if($errors->has('image'))
            <div class="error text-danger">{{ $errors->first('image') }}</div>
        @endif

    </div>

@endsection

@section('checkbox')
    <div id="kategori">
        @foreach ($kategori as $c)
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="category[]" value="{{$c->id}}">
                {{$c->name}}
            </label>
        @endforeach
    </div>
@endsection

@section('submit_button')
    <button type="submit" class="btn btn-success" id="tombol1">Post</button>

    <div class="mt-4"></div>
@endsection

