@extends('layouts.app')

@section('content')

                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Member Name</th>
                          
                          <th>Email</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $key => $user)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->name }}</td>
                         
                            <td>{{ $user->email }}</td>
                            
                        
                            <td><a href="{{url('view-user/'.$user->id)}}" class="btn btn-primary">View</a><a href="{{url('edit-user/'.$user->id)}}" class="btn btn-success">Edit</a><a href="{{url('delete-user/'.$user->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection