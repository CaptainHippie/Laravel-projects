@extends('admin.layout')
@section('content')
<div class="card" style="background-color:rgba(234, 225, 225, 0.96);padding:25px">
    <div style="margin-left:18px;width:97%">
        <h2>ADD NEW USER</h2><hr>
        </div>
    <div class="card-body">
        <form action="{{ url('admin') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label><br>
        <input type="text" name="fullname" id="fullname" class="form-control"><br>
        <label>Email</label><br>
        <input type="email" name="email" id="email" class="form-control"><br>
        <label>Mobile</label><br>
        <input type="number" name="mobile" id="mobile" class="form-control"><br>
        <label>Username</label><br>
        <input type="text" name="username" id="username" class="form-control"><br>
        <label>Password</label><br>
        <input type="password" name="password" id="password" class="form-control"><br>
        <input type="submit" value="Save" class="btn btn-success">
        </form>
        <div style="margin: -38px 70px"> <a href="{{ url('/admin/') }}">
            <button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true">
        </i>Back</button></a></div><br><br>
    </div>
</div>
@stop
