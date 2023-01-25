@extends('Component.navbar')

@section('document_title', 'Sign Up')

@section('body')
<div class="row flex-fill">
    <div class="col-md-6">
        <img src="../../sign_up_picture2.jpg" class="card-img-top" width="800" height="800">
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-5">
        <form class="form-signin" action="/sign-up" method="POST">
            @csrf
            <div class="m-5"></div>
            <h1 class="mb-3 font-weight-bold text-left mb-5">Let's create a new account</h1>
            <h5 class="mb-5 font-weight-light text-left mb-5">Don't miss out on being a part of Indonesia's most popular online community</h5>

            <label for="username" class="h5">New Username</label>
            <input type="string" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="(5-20 letters)" autofocus="" value="{{ old('username') }}">

            <label for="email" class="h5 mt-3">Email address</label>
            <input type="string" id="email" name="email" class="form-control @error('email') is-invalid @enderror" autofocus="" value="{{ old('email') }}">

            <label for="password" class="h5 mt-3">New Password</label>
            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="5-20 characters" autofocus="">

            @if ($errors->any())
                <p class="mt-5 text-danger">{{$errors->first()}}</p>
            @endif

            <input type="submit" class="btn btn-lg btn-primary btn-block my-5" value="Submit">

            <p class="text-left">Already registered?<br><a href="/sign-in">Sign in here</a></p>
        </form>
    </div>
</div>
@endsection
