@extends('Component.navbar')

@section('document_title', 'IndoForum')

<link rel="stylesheet" href="./post.css">
@section('body')
    <div id="isi">

        @yield('Judul')

        <form enctype="multipart/form-data" @yield('method') @yield('action') class="d-flex flex-column align-items-center">
            @csrf
            @yield('method_field')

            <div class="mb-3 w-100">
                <label for="title" class="form-label">Post Title</label>
                <input name="title" type="text" class="form-control" @error('title') is-invalid @enderror @yield('titleValue') id="title" required>

                @if($errors->has('title'))
                    <div class="error text-danger">{{ $errors->first('title') }}</div>
                @endif
            </div>

            <div class="mb-3 w-100">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" type="textarea" class="form-control" @error('content') is-invalid @enderror id="content" required>@yield('contentValue')</textarea>

                @if($errors->has('content'))
                    <div class="error text-danger">{{ $errors->first('content') }}</div>
                @endif

            </div>

            @yield('gambar')

            @yield('checkbox')

            @yield('submit_button')

        </form>
    </div>

@endsection
