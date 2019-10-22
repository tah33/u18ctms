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
    <div class="s" >      @foreach ($team as $key=> $team)
        
        <center>

    <table class="table table-hover table-bordered">
                    <tr>
                      
                          <td>{{$key+1}}</td>
                            
                           <td>{{ $team->name }}</td>
                           <td><img src="{{asset('public/images/'.$team->image)}}" width="50"/></td>
                       </tr>
                          
                            
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