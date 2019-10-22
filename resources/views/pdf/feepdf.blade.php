 <table border="1">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Team Name</th>
                          <th>Fee(in Tk)</th>
                          
                          <th>Fine(in Tk)</th>
                          <th>Total Payment(in Tk)</th>
                          <th>Payable Fee(in Tk)</th>
                          <th>Payable Fine(in Tk)</th>
                          <th>Total Payable Amount(in Tk)</th>
                          
                        
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($fee as $key => $fee)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $fee->team_name }}-U18</td>
                            <td>{{ $fee->fee }}</td>
                            <td>{{ $fee->fine }}</td>
                            <td>{{ $fee->total }}</td>
                            <td>{{ $fee->paid_fee }}</td>
                            <td>{{ $fee->paid_fine }}</td>
                            <td>{{ $fee->paid_total }}</td>
                        </tr> @endforeach
                    </tbody>
                </table>

             
