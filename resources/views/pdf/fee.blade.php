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
                          <th>Team</th>
                          <th>Match</th>
                          <th>Round</th>
                          
                          <th>Fee(in Tk)</th>
                          
                          <th>Fine(in Tk)</th>
                          <th>Total Payment(in Tk)</th>
                          <th>Payable Fee(in Tk)</th>
                          <th>Payable Fine(in Tk)</th>
                          <th>Total Pay(in Tk)</th>
                        </tr>
                    
                        @foreach ($fees as $key => $fee)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $fee->team }}-U18</td>
                            <td>{{ $fee->match_name }}</td>
                             <td>{{ $fee->round == 'first'?'First':($fee->round == 'ko'?'Knock-Out':'Final') }}</td>
                            <td>{{ $fee->fee }}</td>
                            <td>{{ $fee->fine }}</td>
                            <td>{{ $fee->total }}</td>
                            <td>{{ $fee->paid_fee }}</td>
                            <td>{{ $fee->paid_fine }}</td>
                            <td>{{ $fee->paid_total }}</td>
                          </tr>
                          
                        @endforeach
                      
                    </table>