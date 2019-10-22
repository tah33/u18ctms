<?php

namespace App\Http\Controllers;

use App\Fee;
use App\User;
use Illuminate\Http\Request;
use App\Team;
use App\Match;
use Auth;
use Toastr;
use DB;
use App\Player;
use App\Run;
class FeeController extends Controller
{
     public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $fees=Fee::find($id);
        $fee=$fees->fee;
        $fee=$fees->total;
        if($fees->paid_total != $fees->total){
        $fine=$fees->fine;
        $calc=$fee*($fine/100);
        return view('fee.edit-fees',compact('fees','calc'));
    }
    else{
        Toastr::info('You Have no Dues','Info!');
        return back();
    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
            $request->validate([
    'paid_fee' => 'required|same:fee',
]);  
            //clearing the dues
         $fees=Fee::find($id);
         $fees->paid_fee=$request->input('paid_fee');
         $fees->paid_fine=$request->input('paid_fine');
         $fees->paid_total=$fees->paid_fee+$fees->paid_fine;
         $total=$fees->total;
         if($fees->paid_total == $total){
         $fees->save();
         Toastr::success('Due Cleared','success!');
            return redirect('fee');
        }
else{
    Toastr::warning('Enter Your AMounts Carefully','Warning!');
            return back();
}
    }    

    /**
     * Display the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function show(Fee $fee)
    {
        //show all fees with pagination
       
         $fees=Fee::all();
         $rounds = Run::distinct()->get(['round']);
$select1=Run::where('round','=','first')->limit(1)->orderBy('id','desc')->get(['round']);
foreach ($rounds as $key => $round) {
    $ro[]=$round->round;
}
$round=
         $user=Auth::user()->role;
      return view('fee.fees',compact('fees','ro'));   
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function edit(Fee $fee,$fees_id)
    {
        //show form for assigning fine
        $fees=DB::table('fees')
        ->leftJoin('players','fees.team','=','players.team')
        ->select('fees.*','players.*')
        ->where('fees.fees_id',$fees_id)->get();
        $fine=$fees->first()->fine;
        $name=$fees->first()->name;
        
       if($fine == ''){
        return view('fee.set-fee',compact('fees'));
       }
       else{
        Toastr::info("Fine is Already Assigned for $name",'!Info');
        return back();
       }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $fees_id)
    {
        $request->validate([
    'fine' => 'required|lte:100',
    'player' => 'required',
    'reason' => 'required',  
]);
        //assigning fine
          $fees=Fee::findorfail($fees_id);
          $fee=$fees->first()->fee;  
          $fees->fine = $request->input('fine');
          $fine=$fee*($fees->fine)/100;
          $fees->player = $request->input('player');
          $fees->reason = $request->input('reason');
          $fees->total = $fine+$fee;
          $fees->save();
Toastr::success("Fine assigned for {$fees->player} for doing $fees->reason",'success!');
            return redirect('fees');
    }
   
    public function view()
    {
        //show each team fees from current logged in manager
        $fees=DB::table('teams')
        ->join('fees','teams.team','=','fees.team')
        ->select('teams.*','fees.*')
        ->where('teams.manager',Auth::user()->username)
        ->get();
foreach ($fees as $key => $fee) {
    $list[]=$fee->paid_total;
       
}
        return view('fee.fee',compact('fees','list'));
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fee  $fee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fee $fee)
    {
        //
    }
}
