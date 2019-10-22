@extends('layouts.app')

@section('content')
                  <table class="table table-hover table-bordered">
                      <thead>
                        <tr>
                          <th width="5">No.</th>
                          <th>Team</th>
                          <th>Match</th>
                          <th>Round</th>   
                          <th>Fee(in Tk)</th>
                          <th>Fine(in Tk)</th>
                          <th>Total Payment(in Tk)</th>
                          <th>Payable Fee(in Tk)</th>
                          <th>Payable Fine(in Tk)</th>
                          <th>Total Pay(in Tk)</th>
                          @if (in_array("", $list))
                          <th>Action</th>@endif
                        </tr>
                      </thead>
                      <tbody>
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
                          @if($fee->paid_total != $fee->total)
                    <td><a href="{{url('due/'.$fee->fees_id)}}" class="btn btn-success">Pay Dues</a></td>
              @endif
                     
                          </tr>
                        @endforeach
      </tbody>
    </table>
@endsection