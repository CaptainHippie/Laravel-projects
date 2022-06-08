@extends('admin.layout')
@section('content')<br><br>
<div class="container">
<div class="row">
<div class="card" style="background-color:rgba(234, 225, 225, 0.96);width:86%;margin-left:85px"><br>
    <div style="margin-left:30px;width:94%">
        <h2>USER DETAILS</h2><hr>
        </div>
    <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $user->fullname }}</h5>
        <p class="card-text">Email : {{ $user->email }}</p>
        <p class="card-text">Mobile : {{ $user->mobile }}</p>
        <p class="card-text">Username : {{ $user->username }}</p>
        <p class="card-text">Password : {{ $user->password }}</p>
    </div><hr style="margin-left:14px;width:97%">
    <a href="{{ url('/admin/') }}">
        <button class="btn btn-primary" style="margin-left: 14px"><i class="fa fa-pencil-square-o">
        </i>Back</button></a>
    </div><br>
</div>
</div>
</div>
