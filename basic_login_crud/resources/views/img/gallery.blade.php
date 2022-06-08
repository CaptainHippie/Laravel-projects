<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Image Gallery</title>
	<link rel="shortcut icon" href="../img/star.png" type="image/png">
	<!-- Bootstrap CDN down below -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/gallery.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
	<div class="collapse navbar-collapse" id="bs-nav-demo">
		<ul class="nav navbar-nav">
		<li><a href="#">Dashboard</a></li>
		</ul>
	</div>
	</div>
</nav>
<div class="container">
<div class="jumbotron">
	<h1><i class="fa fa-camera-retro"></i>Image Gallery</h1><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if ($message = Session::get('fail'))
        <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <form method="POST" action={{route('img-add')}} enctype="multipart/form-data">
    @csrf
        <div class="form-group">
            <label for="photo" class="btn btn-block btn-default" style="width:40%">SELECT IMAGE</label>
            <input type="file" name="photo" id='photo' class="form-control" style="visibility:hidden;">
            <span class="text-danger">@error('photo') {{$message}} @enderror</span>
        </div>
        <div class="form-group">
            <input type="submit" name="upload" class="btn btn-block btn-primary"
            style="width:25%;margin-top:-8.3%;margin-left:41%"value="Upload">
        </div>
    </form>


</div>
    @foreach($all_images as $item)
        <div class="col-lg-4 col-sm-12">
		<div class="thumbnail">
			<img src="/images/{{ $item->img_name }}"/>
		</div>
		</div>
    @endforeach
</div>
	<!-- JQuery CDN -->
	<script src="http://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
    crossorigin="anonymous"></script>
	<!-- JavaScript Bootstrap CDN -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>


