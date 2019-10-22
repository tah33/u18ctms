@extends('layouts.app')

@section('content')
<a href="{{url('pdf-match-result')}}" class="btn btn-primary">Get PDF Report</a>
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Team</th>
                          <th>Match</th>
                          <th>Total Run</th>
                          <th>Result</th>
                          <th>Pints</th>
                          <th>Round</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($results as $key => $result)
                          <tr>
                            <td>{{ $key+1 }}</td>

                            <td>{{ $result->team }}-U18</td>
                            <td>{{ $result->match_name }}</td>
                            <td>{{ $result->total }}</td>
                            <td>{{ $result->result }}</td>
                            <td>{{ $result->points }}</td>
                            
                            <td>{{ $result->round == 'first' ? 'First' : ($result->round== 'ko' ? 'Knock-Out' :'Final') }}</td>
                            
                            
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