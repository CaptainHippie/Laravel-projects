<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>dashboard</title>
</head>
<body style="background-color: black">
<div class="container" style="margin-left: 580px">
<div class="row">
<div class="col-md-4 col-md-offset-4" style="margin-top: 25px;background-color:rgba(234, 225, 225, 0.96);
    padding:3%;border-radius:2%">
<h4>DASHBOARD</h4><hr>
@if (Session::has('pls_logout'))
<div class="alert alert-danger">{{Session::get('pls_logout')}}</div>
@endif
<b>Welcome, {{$data->username}}</b><br><br>
Name : {{$data->fullname}}<br>
Email : {{$data->email}}<br>
Phone : {{$data->mobile}}<br>
Username : {{$data->username}}<br>
Password : {{$data->password}}<br><br>

<a href="logout"><button class="btn btn-block btn-secondary">LOGOUT</button></a>
</div></div></div>
</body>
</html>
