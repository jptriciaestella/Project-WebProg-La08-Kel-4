@extends('Component.navbar')

@section('document_title', 'Sign Up')

@section('body')
<div class="row flex-fill">
    <div class="col-md-6">
        <img src="../../edit_password_picture2.jpg" class="card-img-top" width="800" height="800">
    </div>
    <div class="col-md-1">
    </div>
    <div class="col-md-4">
        <form class="form-signin" action="/sign-up" method="POST">
            @csrf
            <div class="m-5"></div>
            <h1 class="mb-3 font-weight-bold text-left mb-5">Change Your Password</h1>
            <h5 class="mb-5 font-weight-light text-left mb-5">Feeling that your credentials are compromised? Update your login information</h5>

            <label for="password" class="h5 mt-3">Re-enter Current Password</label>
            <input type="password" id="current-password" name="oldPassword" class="form-control @error('password') is-invalid @enderror" placeholder="(Verify it's really you who's changing the password)" autofocus="">

            <label for="password" class="h5 mt-3">New Password</label>
            <input type="password" id="new-password" name="newPassword" class="form-control @error('password') is-invalid @enderror" placeholder="(Set a new password for your account)" autofocus="">

            <label for="password" class="h5 mt-3">Confirm New Password</label>
            <input type="password" id="new-password-confirm" name="confirmNewPassword" class="form-control @error('password') is-invalid @enderror" placeholder="(Make sure that you did not mistype your new password)" autofocus="">

            @if ($errors->any())
                <p class="text-danger">{{$errors->first()}}</p>
            @endif
            <div class="m-5"></div>
            <input type="submit" class="btn btn-lg btn-primary btn-block my-3" value="Confirm Password Change">

            <a href="/profile/{{Auth::user()->username}}" class="btn btn-outline-primary" style="width: 250px; margin-right:50px">Kembali ke Profil</a>
        </form>
    </div>
    <div class="col-md-1">
    </div>
</div>

@endsection
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Change Password</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('changePassword') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="current-password" class="col-md-4 col-form-label text-md-right">Current Password</label>

                            <div class="col-md-6">
                                <input id="current-password" type="password" class="form-control @error('current-password') is-invalid @enderror" name="current-password" required autofocus>

                                @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password" class="col-md-4 col-form-label text-md-right">New Password</label>

                            <div class="col-md-6">
                                <input id="new-password" type="password" class="form-control @error('new-password') is-invalid @enderror" name="new-password" required>

                                @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="new-password-confirm" class="col-md-4 col-form-label text-md-right">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Change Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
