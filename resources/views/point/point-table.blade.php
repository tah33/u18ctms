@extends('layouts.app')

@section('content')
<h2>Total:{{$points->total()}}</h2>
<h3>On Current Page:{{$points->count()}}</h3>
<a href="{{url('pdf-point')}}" class="btn btn-primary">Get PDF Report</a>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Team</th>
                          <th>Run Rate</th>
                          
                          <th>Points</th>
                         
                          <th>Round</th>
                          <th>Match</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($points as $key => $point)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $point->team }}-U18</td>
                             
                            <td>{{ $point->run_rate }}</td>

                            <td>{{ $point->points }}</td>
                            <td>{{ $point->round == 'first' ? 'First' : ($point->round == 'ko' ? 'Knock-Out' : 'Final')}}</td>

                            <td>{{ $point->match_name }}</td>

                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    {{$points->links()}}
@endsection