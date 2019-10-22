        <head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
               <table>
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
                      
                    </table>