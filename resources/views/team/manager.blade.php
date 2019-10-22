@extends('layouts.app')

@section('content')@foreach ($team as $key => $team)
        <center>
<h1>Team:{{$team->team}}-U18</h1>
<h3>Team Manager:{{$team->name}}</h3>
<h3>Coach Name:{{$team->coach}}</h3>
</center>
@endforeach
                    <table class="table table-hover table-bordered">
                      <thead>
                      <tr>
                          <th width="5">No.</th>
                          <th>Player Name</th>
                       <th>Age</th>
                       <th>Category</th>
                       <th>Batting Style</th>
                       <th>Bowling Style</th>
                       <th>Image</th>
                       <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($players as $key => $player)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $player->name }}@if($player->captain)({{$player->captain}})@endif</td>
                            <td>{{ Carbon\Carbon::createFromDate($player->bday)->diff(Carbon\Carbon::now())->format('%y years, %m months and %d days') }}</td>
                            <td>{{ $player->category  == 'batsman' ? 'Batsman' : ($player->category  == 'bowler' ?'Bowler' : 'WickerKeeper')}}</td>
                            <td>{{ $player->batting_style == 'rhb' ? 'Right Hand Bat' :($player->batting_style == 'lhb' ?'Left Hand Bat':'None') }}</td>
                            <td>{{ $player->bowling_style == 'rhb' ? 'Right Hand Bowl' :($player->bowling_style == 'lhb' ?'Left Hand Bowl':'None') }}</td>
                            <td> <img src="{{asset('public/images/'.$player->image)}}" width="50"/></td>
                            <td><a href="{{url('view-player/'.$player->id)}}" class="btn btn-primary">View</a><a href="{{url('edit-player/'.$player->id)}}" class="btn btn-success">Edit</a><a href="{{url('delete-player/'.$player->id)}}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a>

                              @if($player->captain == '')<a href="{{url('captain/'.$player->id)}}" class="btn btn-info" onClick="return confirm('Are you sure you want to select him as a Captain?')">Select As a Captain</a>@endif

                            </td>
                           
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