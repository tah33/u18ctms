@extends('layouts.app')

@section('content')
                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Match</th>
                          <th>Result</th>
                          <th>Round</th>
                          
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($results as $key => $result)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $result->match_name }}-U18</td>
                            <td>{{ $result->result }}</td>
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