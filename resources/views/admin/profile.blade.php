@extends('layouts.app')

@section('content')
<table class="table table-hover table-bordered">
                          <tr> <td>Full Name</td><td>:</td> <td>{{ $user->name }}</td></tr>
                          <tr> <td>UserName</td><td>:</td> <td>{{ $user->username }}</td></tr>
                          <tr> <td>Email</td><td>:</td> <td>{{ $user->email }}</td></tr>
                          <tr> <td>Password</td><td>:</td> <td>{{ $user->password }}</td></tr>
                          <tr> <td>Role</td><td>:</td> <td>{{ $user->role == 'admin' ? 'Admin' :'Team Manager'}}</td></tr>
                    </table>
                   <center> <a href="{{url('edit-profile/'.$user->id)}}" class="btn btn-success">Edit</a></center>
    @endsection