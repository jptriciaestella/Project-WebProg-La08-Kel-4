@extends('Component.navbar')

@section('document_title', 'Sign Up')

@section('body')
<div class="container w-50">
    <form class="form-signin" action="/sign-up" method="POST">
        @csrf
        <div class="m-5"></div>
        <h1 class="mb-3 font-weight-normal text-center mb-5">Sign Up to IndoForum</h1>

        <label for="username" class="h5">Username</label>
        <input type="string" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="(5-20 letters)" autofocus="" value="{{ old('username') }}">

        <label for="email" class="h5 mt-3">Email address</label>
        <input type="string" id="email" name="email" class="form-control @error('email') is-invalid @enderror" autofocus="" value="{{ old('email') }}">

        <label for="password" class="h5 mt-3">Password</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="5-20 characters" autofocus="">

        @if ($errors->any())
            <p class="mt-5 text-danger">{{$errors->first()}}</p>
        @endif

        <input type="submit" class="btn btn-lg btn-primary btn-block my-5" value="Submit">

        <p class="text-center my-5">Already registered? <a href="/sign-in">Sign in here</a></p>
        <div class="m-5"></div>
    </form>
</div>
@endsection
