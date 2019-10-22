@extends('layouts.app')

@section('content')
<table class="table table-hover table-bordered">
                    
                      
                          
                            
                          <tr> <td>Name</td><td>:</td> <td>{{ $users->name }}</td></tr>
                          <tr> <td>UserName</td><td>:</td> <td>{{ $users->username }}</td></tr>
                            <tr><td>Email</td><td>:</td><td>{{ $users->email }}</td></tr>
                          <tr> <td>Role</td><td>:</td> <td>{{ $users->role=='manager'?'Team Manager':'Admin' }}</td></tr> 
                            
                             <tr><td>Account Created At</td><td>:</td><td>{{ $users->created_at }}</td></tr>
                             <tr><td>Account Updated At</td><td>:</td><td>{{ $users->updated_at }}</td></tr>
                            
                      
                     
                    </table>
                    @endsection