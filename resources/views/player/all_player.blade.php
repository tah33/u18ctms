@extends('layouts.app')

@section('content')
<div class="text-right"><a href="{{url('pdf-player')}}" class="btn btn-primary">Get PDF Report</a></div>

                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Player Name</th>
                          <th>Category</th>
                          <th>Team</th>
                          <th>Age</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($players as $key => $player)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $player->name }}{{ $player->captain }}</td>
                            <td>{{ $player->category == 'batsman' ? 'Batsman' : ($player->category == 'bowler' ? 'Bowler' : 'WickeKeeper') }}</td>
                            <td>{{ $player->team }}-U18</td>
                            <td>{{ Carbon\Carbon::createFromDate($player->bday)->diff(Carbon\Carbon::now())->format('%y years, %m months and %d days') }}</td>
                         
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
           {{$players -> links()}}
@endsection