<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login</title>
</head>
<body style="background-color: black">
<div class="container" style="margin:auto 580px">
<div class="row">
<div class="col-md-4 col-md-offset-4" style="margin-top: 25px;background-color:rgba(234, 225, 225, 0.96);
    padding:3%;border-radius:2%">
<h4>LOGIN</h4><hr>
<form action={{route('user-login')}} method="POST">
@if (Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if (Session::has('pfail'))
<div class="alert alert-danger">{{Session::get('pfail')}}</div>
@endif
@if (Session::has('no_user'))
<div class="alert alert-danger">{{Session::get('no_user')}}</div>
@endif
@if (Session::has('no_login'))
<div class="alert alert-danger">{{Session::get('no_login')}}</div>
@endif
@csrf
<div class="form-group">
    <label for="uname">Username</label>
    <input type="text" name="uname" class="form-control" value={{old('uname')}}>
    <span class="text-danger">@error('uname') {{$message}} @enderror</span>
</div><br>
<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="passwd" class="form-control">
    <span class="text-danger">@error('passwd') {{$message}} @enderror</span>
</div><br>
<div class="form-group">
    <input type="submit" name="login" class="btn btn-block btn-primary" value="LOGIN">
</div>
</form><br><br>
<a href="register">New User? Register here</a>
</div></div></div>
</body>
</html>
