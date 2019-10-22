@extends('layouts.app')

@section('content')

                    <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                        
                          <th>Team</th>
                          <th>First Over</th>
                          <th>Second Over</th>
                          <th>Third Over</th>
                          <th>Fourth Over</th>
                          <th>Fifth Over</th>
                          <th>Total Run</th>
                          <th>Run Rate</th>
                          <th>Match Name</th>
                          <th>Round</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($runs as $key => $run)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $run->team }}-U18</td>
                            <td>{{ $run->ov1 }}</td>
                            <td>{{ $run->ov2 }}</td>
                            <td>{{ $run->ov3 }}</td>
                            <td>{{ $run->ov4 }}</td>
                            <td>{{ $run->ov5 }}</td>
                            <td>{{ $run->total }}</td>
                            <td>{{ $run->run_rate }}</td>
                            <td>{{ $run->match_name }}</td>
                          <td>{{ $run->round == 'first' ? 'First' : ($run->round == 'ko' ? 'Knock-Out' : 'Final') }}</td>
                            
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
@endsection