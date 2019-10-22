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
                          <th>No.</th>
                          <th>Match</th>
                          <th>Venue</th>
                          <th>Round</th>
                          <th>Time</th>
                          <th>Date</th>
                        </tr>
                    
                        @foreach ($matches as $key => $match)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $match->team1 }}-U18 vs {{ $match->team2 }}-U18</td>
                            
                            <td>{{ $match->venue }},{{$match->location}}</td>
                            <td>{{ $match->round == 'first'?'First':($match->round == 'ko'?'Knock-Out':'Final') }}</td>
                            
                    <td>{{ Carbon\Carbon::parse($match->time)->format('h:i A')}}</td>
                            <td>{{ Carbon\Carbon::parse($match->time)->format('M d, Y')}}</td>
                            
                           
                          </tr>
                          
                        @endforeach
                      
                    </table>