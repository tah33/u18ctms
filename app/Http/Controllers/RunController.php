<?php

namespace App\Http\Controllers;

use App\Run;
use Illuminate\Http\Request;
use App\Match;
use Toastr;
use Auth;
use DB;
use App\Result;
use App\Point;
use App\Fee;

class RunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $runs=DB::table('teams')
        ->join('runs','teams.team','=','runs.team')
        ->select('teams.*','runs.*')
        ->where('teams.manager',Auth::user()->username)
        ->get();

        return view('run.view-run',compact('runs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    $teams=DB::select('SELECT DISTINCT team1 FROM matches UNION SELECT DISTINCT team2 FROM matches');
        $first=Match::where('round','=','first')->get();
        $ko=Match::where('round','=','ko')->get();
        $final=Match::where('round','=','final')->get();
    
        if(Auth::user()->role == 'admin'){
 
        return view('run.run',compact('teams','first','ko','final'));
    }
      else{
        Toastr::warning('You are not allowed to go there','Warning!');
        return back();
    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                   $request->validate([
     'team' => 'required',
     'ov1' => 'required|integer',
     'ov2' => 'required|integer',
     'ov3' => 'required|integer',     
     'ov4' => 'required|integer',
     'ov5' => 'required|integer',
     'match_name' => 'required',
     
]);  
        $runs= new Run();
        $runs->team = $request->input('team');
        $runs->ov1 = $request->input('ov1');
        $runs->ov2 = $request->input('ov2');
        $runs->ov3 = $request->input('ov3');
        $runs->ov4 = $request->input('ov4');
        $runs->ov5 = $request->input('ov5');
        $runs->total = $runs->ov1+$runs->ov2+$runs->ov3+$runs->ov4+$runs->ov5;
        $runs->match_name = $request->input('match_name');
        $runs->run_rate = $runs->total/5;

        $match = DB::table("matches")
        ->where("match_name", "=", $runs->match_name)
        ->orderBy("id", "DESC")
        ->limit(1) 
        ->get();
        if(count($match) > 0)
        {
          $round=$match->first()->round;
          $runs->round=$round;
        }
        //getting fee info
        $fine = Fee::where('team','=',$runs->team)
        ->get();
       if(count($fine) > 0){
          foreach ($fine as $f) {
          $total[]=$f->total;
          $paid[]=$f->paid_total;
          sort($total);
          sort($paid);
        }
        
}
else{
    Toastr::error('Choose Correct Team or Match','Error!');
    return back();
}
//getting this team data
$existence=Run::where('team','=',$runs->team)
->where('match_name','=',$runs->match_name)
->where('round','=',$runs->round)->get();

            if(count($fine) > 0 && $total == $paid) {
                if(count($existence)==0){
                       $runs->save();

           //getting the opponent data
            $run = Run::where('match_name', '=', $runs->match_name)
           ->where('round', '=', $runs->round)
           ->where('team', '!=', $runs->team)
           ->get();
           if(count($run) > 0){
          $team=$run->first()->team;
          $run_rate=$run->first()->run_rate;
          $score=$run->first()->total;
     
         $results=new Result();
         $results->match_name=$runs->match_name;
         $results->round=$runs->round;
     
         if($runs->total==$score)
{
 $results->result="draw";
DB::table('points')->insert([
    ['team' => $runs->team, 'points' => 1, 'match_name' => $results->match_name, 'round' => $results->round, 'run_rate' =>$run_rate],
    ['team' => $team, 'points' => 1, 'match_name' => $results->match_name, 'round' => $results->round, 'run_rate' =>$run_rate]
]);
}
if($runs->total > $score)
{
 $results->result=$runs->team." won by ".($runs->total-$score)." run";
 DB::table('points')->insert([
    ['team' => $runs->team, 'points' => 2, 'match_name' => $results->match_name, 'round' => $results->round, 'run_rate' =>$runs->run_rate],
    ['team' => $team, 'points' => 0, 'match_name' => $results->match_name, 'round' => $results->round, 'run_rate' =>$run_rate]
]);
}
if($runs->total < $score){
$results->result=$team." won by " .($score-$runs->total). " run";
DB::table('points')->insert([
    ['team' => $team, 'points' => 2, 'match_name' => $results->match_name, 'round' => $results->round, 'run_rate' =>$run_rate],
    ['team' => $runs->team, 'points' => 0, 'match_name' => $results->match_name, 'round' => $results->round, 'run_rate' =>$runs->run_rate]
]);
 }
 $result=$results->save();
 if($result)
 {
 Toastr::Success("Result is declared for {$results->match_name} ",'Congrats!');
 return back();   
 }
}
            }
else{
 Toastr::info('Run is Already Calculated for'.$runs->team,'Info!');
 return back();   
}
           Toastr::Success("{$runs->team}-U18 make {$runs->total} runs",'Congrats!');
 return back();
     }
    else{
 Toastr::error("{$runs->team}-U18 didnot cleared Due yet",'Error!');
 return back();
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Run  $run
     * @return \Illuminate\Http\Response
     */
    public function show(Run $run)
    {
          $runs=Run::paginate(15);
       
        return view('run.runs',compact('runs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Run  $run
     * @return \Illuminate\Http\Response
     */
    public function edit(Run $run)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Run  $run
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Run $run)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Run  $run
     * @return \Illuminate\Http\Response
     */
    public function destroy(Run $run)
    {
        //
    }
}
