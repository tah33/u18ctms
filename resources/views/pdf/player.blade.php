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
                          <th>Player Name</th>
                          <th>Phone No.</th>
                          <th>Email</th>
                          <th>Category</th>
                          <th>Team</th>
                          <th>Age</th>
                          <th>Picture</th>
                        </tr>
                    
                        @foreach ($players as $key => $player)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->cell }}</td>
                            <td>{{ $player->email }}</td>
                            <td>{{ $player->category == 'batsman' ? 'Batsman' : ($player->category == 'bowler' ? 'Bowler' : 'WickeKeeper') }}</td>
                            <td>{{ $player->team }}-U18</td>
                            <td>{{ Carbon\Carbon::createFromDate($player->bday)->diff(Carbon\Carbon::now())->format('%y years, %m months') }}</td>
                            <td><img src="{{asset('public/images/'.$player->image)}}" width="100"/></td>
                          </tr>
                        @endforeach
                      
                    </table>