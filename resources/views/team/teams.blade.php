@extends('layouts.app')
@section('content')
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Team Name</th>       
                          <th>Coach</th>
                          <th>Team Manager</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($team as $key => $team)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $team->team_name }}-U18</td>
                            <td>{{ $team->coach }}</td>
                            <td>{{ $team->name }}</td>
                            <td><a href="{{url('view-team/'.$team->id)}}" class="btn btn-primary">View</a><a href="{{url('edit-team/'.$team->id)}}" class="btn btn-success">Edit</a><a href="{{url('delete-team/'.$team->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
@endsection