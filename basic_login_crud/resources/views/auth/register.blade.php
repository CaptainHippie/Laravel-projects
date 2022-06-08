<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registration</title>
</head>

<body style="background-color: black">

<div class="container" style="margin:auto 580px">
<div class="row">
<div class="col-md-4 col-md-offset-4" style="margin-top: 25px;background-color:rgba(234, 225, 225, 0.96);
    padding:3%;border-radius:2%">
<h4>REGISTRATION</h4><hr>
<form action={{route('user-register')}} method="POST">
@if (Session::has('success'))
<div class="alert alert-success">{{Session::get('success')}}</div>
@endif
@if (Session::has('fail'))
<div class="alert alert-danger">{{Session::get('fail')}}</div>
@endif
@csrf
<div class="form-group">
    <label for="nm">Name</label>
    <input type="text" name="nm" class="form-control" value={{old('nm')}}>
    <span class="text-danger">@error('nm') {{'Name cannot be empty'}} @enderror</span>
</div><br>
<div class="form-group">
    <label for="em">Email</label>
    <input type="email" name="em" class="form-control" value={{old('em')}}>
    <span class="text-danger">@error('em') {{$message}} @enderror</span>
</div><br>
<div class="form-group">
    <label for="mob">Mobile</label>
    <input type="number" name="mob" class="form-control" value={{old('mob')}}>
    <span class="text-danger">@error('mob') {{$message}} @enderror</span>
</div><br>
<div class="form-group">
    <label for="unm">Username</label>
    <input type="text" name="unm" class="form-control" value={{old('unm')}}>
    <span class="text-danger">@error('unm') {{$message}} @enderror</span>
</div><br>
<div class="form-group">
    <label for="pw">Password</label>
    <input type="password" name="pw" class="form-control">
    <span class="text-danger">@error('pw') {{$message}} @enderror</span>
</div><br>
<div class="form-group">
    <label for="cpw">Confirm Password</label>
    <input type="password" name="cpw" class="form-control">
    <span class="text-danger">@error('cpw') {{$message}} @enderror</span>
</div><br><br>
<div class="form-group">
    <input type="submit" name="register" class="btn btn-block btn-primary" value="REGISTER">
</div>
</form><br>
<a href="login"><button class="btn btn-block btn-secondary">BACK TO LOGIN</button></a>
</div></div></div>
</body>
</html>
