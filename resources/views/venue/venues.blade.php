@extends('layouts.app')

@section('content')

                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Venue Name</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($venue as $key => $venue)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $venue->name }}</td>
                          
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
      
@endsection