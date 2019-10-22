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
                          <th>Run Rate</th>
                          
                          <th>Points</th>
                         
                          <th>Round</th>
                          <th>Match</th>
                         
                        </tr>
                    
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
                      
                    </table>