@extends('layouts.app')

@section('content')
<a href="{{url('pdf-match')}}" class="btn btn-primary">Get PDF Report</a>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Match</th>
                      
                          
                          <th>Venue</th>
                          <th>Round</th>
                          <th>Time</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($match as $key => $match)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $match->team1 }}-U18 vs {{ $match->team2 }}-U18</td>
                            
                            <td>{{ $match->venue }},{{$match->location}}</td>
                            <td>{{ $match->round == 'first'?'First':($match->round == 'ko'?'Knock-Out':'Final') }}</td>
                            
                    <td>{{ Carbon\Carbon::parse($match->time)->format('h:i A')}}</td>
                            <td>{{ Carbon\Carbon::parse($match->time)->format('M d, Y')}}</td>
                            
                           
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