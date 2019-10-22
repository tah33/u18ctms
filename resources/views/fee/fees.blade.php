@extends('layouts.app')
@section('content')
<td><a href="{{url('pdf-fee')}}" class="btn btn-primary">Get PDF Report</a></td>
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
                          <th>Player</th>
                          <th>Reason</th>
                          
                          <th>Action</th>
                          
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
                            
                            <td>{{ $fee->fine }}@if($fee->fine)%
                            @endif</td>
                            <td>{{ $fee->total }}</td>
                            <td>{{ $fee->paid_fee }}</td>
                            <td>{{ $fee->paid_fine }}</td>
                            <td>{{ $fee->paid_total }}</td>
                            <td>{{ $fee->player }}</td>
                            <td>{{ $fee->reason }}</td>
                    <td>   @if($fee->round == 'final')
                    <a href="{{url('edit-fee/'.$fee->fees_id)}}" class="btn btn-primary">Assign fine</a>
                @else 
                No fine
                @endif
                </td>
                            
                     
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @endsection