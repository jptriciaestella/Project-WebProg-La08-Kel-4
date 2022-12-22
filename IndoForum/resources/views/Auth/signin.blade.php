@extends('Component.navbar')

@section('document_title', 'Sign In')

@section('body')
<div class="container w-50">
    <form class="form-signin" action="/sign-in" method="POST">
        @csrf
        <div class="m-5"></div>
        <h1 class="mb-3 font-weight-normal text-center mb-5">Sign In to IndoForum</h1>

        <label for="email" class="h5">Email address</label>
        <input type="string" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autofocus="" value="{{Cookie::get('remember-email') !== null ? Cookie::get('remember-email') : ""}}">

        <label for="password" class="h5 mt-3">Password</label>
        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="(5-20 characters)" autofocus=""  value="{{Cookie::get('remember-password') !== null ? Cookie::get('remember-password') : ""}}">

        <div class="checkbox mb-3 mt-3">
          <label>
            <input type="checkbox" name="remember" id="remember" checked={{Cookie::get('mycookie') !== null}}> Remember me
          </label>
        </div>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <p class="text-danger">{{$errors->first()}}</p>
        @endif

        <input type="submit" class="btn btn-lg btn-primary btn-block my-5" value="Sign in">

        <p class="text-center my-5">Not registered yet? <a href="/sign-up">Register here</a></p>
        <div class="m-5 p-5"></div>
    </form>
</div>
@endsection
