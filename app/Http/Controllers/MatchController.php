<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;
use Auth;
use App\Team;
use App\Venue;
use Toastr;
use DB;
use Carbon\Carbon;
use App\Point;
class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //showing form for scheduling match
        $teams=Team::all();
       $venues=Venue::all(); 
       $first_match=Point::where('round','first')->get();
       $ko_match=Point::where('round','ko')->get();
$kos = DB::select('SELECT team,round,SUM(points) AS total from points WHERE round="first" GROUP by team ORDER BY total desc, run_rate desc limit 4');
       $venues=Venue::all(); 
$finals = DB::select('SELECT team,round,SUM(points) AS total from points WHERE round="ko" GROUP by team ORDER BY total desc, run_rate desc limit 2');

       if(Auth::user()->role == 'admin'){
return view('match.set-match',compact('teams','venues','kos','finals','ko_match','first_match'));
    }
    else{
        Toastr::warning('You donot have a permission to go there','Warning!');
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
        $min=Carbon::now()->sub('6 months')->calendar();
        $max=Carbon::now()->add('6 months')->calendar();
               $request->validate([
    'team1' => 'required',
    'team2' => 'required|different:team1',
    'venue' => 'required',
    'time' => "required|after:$min|before:$max",
]);  
        
        $matches= new Match();
        $matches->team1 = $request->input('team1');
        $matches->team2 = $request->input('team2');
        $matches->venue = $request->input('venue');
        $matches->time = $request->input('time');
        $matches->match_name = $matches->team1.' vs '.$matches->team2;
        //getting Location of Selected Venue
        $venue = Venue::where('name', '=', $matches->venue)->get();
        $location = $venue->first()->location;
        $matches->location=$location;
        $matches->round = "first";
        //getting time conflicting
        $time_loc = Match::where('time', '=', $matches->time)
        ->where('venue', '=', $matches->venue)
        ->get();
        //getting data about first round mathces
   $first=Match::where('round','=','first')->get();
   
       if(count($first) > 0 && count($first) < 4){   
            foreach($first as $first) 
             {//getting all the teams who already played in first round
             $list1[]=$first->team1;
             $list1[]=$first->team2;
             }
    
 if(in_array($matches->team1,$list1)) {
Toastr::error("{$matches->team1}-U18 Already Played on {$matches->round} round","!Error");
        return back(); 
            }
  elseif(in_array($matches->team2,$list1)) {
Toastr::error("{$matches->team2}-U18 Already Played on {$matches->round} round","!Error");
        return back(); 
            }
}
        //getting the highest point from first round
       $kos = DB::select('SELECT team,round,SUM(points) AS total from points WHERE round="first" GROUP by team ORDER BY total desc, run_rate desc limit 4');
      //getting the highest match for Knoc-out round
      $kos_limit=Match::where('round','=','ko')->get();
       //getting the all match of first round
      $kos_limit2=Point::where('round','=','first')->get();
    
        if(count($kos_limit2) == 8 && count($kos) > 0 && count($kos_limit) <2){
            if(count($kos_limit) == 1){
     $team1=$kos_limit->first()->team1;
       $team2=$kos_limit->first()->team2;
         if($team1 == $matches->team1 || $team1 == $matches->team2){
        Toastr::error("{$team1}-U18 Already Played on {$matches->round} round","!Error");
        return back(); 
        }
    elseif($team2 == $matches->team1 || $team2 == $matches->team2){
        Toastr::error("{$team2}-U18 Already Played {$matches->round} round","!Error");
        return back(); 
        }
   }
            foreach($kos as $kos) 
            {
            $list2[]=$kos->team;
             }
 if(in_array($matches->team1,$list2) && in_array($matches->team2,$list2)) {
//if($items > $matches->team1 && $items > $matches->team2) {
            $matches->round = "ko";
            }
          
} 
        //getting the highest point from Knock-out round
       $finals = DB::select('SELECT team,round,SUM(points) AS total from points WHERE round="ko" GROUP by team ORDER BY total desc, run_rate desc limit 2');
      $finals_limit=Match::where('round','=','final')->get();
      $finals_limit2=Point::where('round','=','ko')->get();

         if(count($finals_limit2) == 4 && count($finals) > 0 && count($finals_limit) == 0){
             foreach($finals as $final)
              {
             $list3[]=$final->team;
        }
 if(in_array($matches->team1,$list3) && in_array($matches->team2,$list3)) {
//if($items > $matches->team1 && $items > $matches->team2) {
            $matches->round = "final";
                }
}
$limit=Match::where('round',$matches->round)->get();
     //Checking for Homeground Match  
    if($matches->location==$matches->team1 || $matches->location==$matches->team2)
    {
       Toastr::error('Homeground Match is Not Allowed','Error!');
       return back();
    }
         //Checking for Time Conflicting
        if(count($time_loc) > 0 ){
    Toastr::error('Time Conflict','Error!');
       return back();
        }
    if(count($limit) == 4)
            {
             Toastr::error("Maximum Match is Played","!Error");
        return back();   
            }
       else{
    
$save=$matches->save();

DB::table('fees')->insert([
    ['team' => $matches->team1, 'fee' => 5000, 'match_name' => $matches->match_name, 'round' => $matches->round, 'total' =>5000],
    ['team' => $matches->team2, 'fee' => 5000, 'match_name' => $matches->match_name, 'round' => $matches->round, 'total' =>5000]
]);

Toastr::success("Match is Scheduled for {$matches->match_name} & also Fee is assigned",'Success!');
       return back();
   }
}
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        $match= Match::all();
        return view('match.show-matches',compact('match'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match,$id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match,$id)
  {

    }
}
