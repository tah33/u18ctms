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
                          <th>Result</th>
                          <th>Round</th>
                          
                          
                        </tr>
                    @foreach ($results as $key => $result)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $result->match_name }}-U18</td>
                            <td>{{ $result->result }}</td>
                            <td>{{ $result->round == 'first' ? 'First' : ($result->round== 'ko' ? 'Knock-Out' :'Final') }}</td>
                            
                            
                          </tr>
                        @endforeach
                      
                    </table>