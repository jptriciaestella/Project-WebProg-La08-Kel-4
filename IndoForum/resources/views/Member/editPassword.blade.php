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
        <form class="form-signin" action="/edit-password" method="POST">
            @csrf
            @method('POST')
            <div class="m-5"></div>
            <h1 class="mb-3 font-weight-bold text-left mb-5">Change Your Password</h1>
            <h5 class="mb-5 font-weight-light text-left mb-5">Feeling that your credentials are compromised? Update your login information</h5>

            <label for="password" class="h5 mt-3">Current Password</label>
            <input type="password" id="currentpassword" name="currentpassword" class="form-control @error('password') is-invalid @enderror" placeholder="(Verify it's really you)" autofocus="">

            <label for="password" class="h5 mt-3">New Password</label>
            <input type="password" id="newpassword" name="newpassword" class="form-control @error('password') is-invalid @enderror" placeholder="(Set your new password)" autofocus="">

            <label for="password" class="h5 mt-3">Confirm New Password</label>
            <input type="password" id="newpasswordconfirm" name="newpasswordconfirm" class="form-control @error('password') is-invalid @enderror" placeholder="(To ensure no mistypes)" autofocus="">

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
