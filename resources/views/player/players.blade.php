@extends('layouts.app')

@section('content')
 <style>
 .s{
border:3px solid black;
height:100% px;
width:450px;
align:center;
background-color:white;
}
@media print{
   .noprint{
       display:none;
}
}

    </style>
   
    <div id="printableArea">
    <div class="s" >      @foreach ($players as $player)
        <img src="{{asset('public/images/'.$player->image)}}" width="200"/><br>
        <center>

    <table class="table table-hover table-bordered">
                          <tr> <td>Full Name</td><td>:</td> <td>{{ $player->name }}({{ $player->captain}})</td></tr>
                            <tr> <td>Height</td><td>:</td> <td>{{ $player->height }}</td></tr>
                            <tr> <td>Weight</td><td>:</td> <td>{{ $player->weight }} KG</td></tr>
                            <tr><td>Birth Date</td><td>:</td><td>{{ $player->bday }}</td></tr>
                            <tr><td>Age</td><td>:</td><td>{{ Carbon\Carbon::createFromDate($player->bday)->diff(Carbon\Carbon::now())->format('%y years, %m months and %d days') }}</td></tr>
                            <tr><td>Category</td><td>:</td><td>{{ $player->category  == 'batsman' ? 'Batsman' : ($player->category  == 'bowler' ?'Bowler' : 'WickerKeeper')}}</td></tr>
                            <tr><td>Batting Style</td><td>:</td><td>{{ $player->batting_style == 'rhb' ? 'Right Hand Bat' :($player->batting_style == 'lhb' ?'Left Hand Bat':'None') }}</td></tr>
                            <tr><td>Bowling Style</td><td>:</td><td>{{ $player->bowling_style == 'rhb' ? 'Right Hand Bowl' :($player->batting_style == 'lhb' ?'Left Hand Bowl':'None') }}</td></trCarbon>
                            
                             <tr><td>Team</td><td>:</td><td>{{ $player->team }}-U18</td></tr>
                            
                        @endforeach
                    </table>
                                    </center>
                                                </div>
                </div>
                <div class="noprint">   <h3 align="center"></h3><center><input type="button" onclick="printDiv('printableArea')" value="Print!" /></center></div>
        
@endsection
<script>
            function printDiv(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }</script>