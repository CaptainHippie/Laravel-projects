@extends('admin.layout')
@section('content')
<div class="card" style="background-color:rgba(234, 225, 225, 0.96);padding:25px">
    <div style="margin-left:18px;width:97%">
        <h2>EDIT USER</h2><hr>
        </div>
    <div class="card-body">
        <form action="{{ url('admin/' .$user->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" value="{{$user->id}}">
        <label>Name</label><br>
        <input type="text" name="fullname" value="{{$user->fullname}}" class="form-control"><br>
        <label>Email</label><br>
        <input type="email" name="email" value="{{$user->email}}" class="form-control"><br>
        <label>Mobile</label><br>
        <input type="number" name="mobile" value="{{$user->mobile}}" class="form-control"><br>
        <label>Username</label><br>
        <input type="text" name="username" value="{{$user->username}}" class="form-control"><br>
        <label>Password</label><br>
        <input type="password" name="password" value="{{$user->password}}" class="form-control"><br>
        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
    <div style="margin: -39px 90px"> <a href="{{ url('/admin/') }}">
        <button class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true">
    </i>Back</button></a></div><br><br>
  </div>
</div>
@stop
