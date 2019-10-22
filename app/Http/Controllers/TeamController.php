<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use App\User;
use Auth;
use DB;
use Toastr;
use App\Fee;
class TeamController extends Controller
{
     public function index()
    {
         if(Auth::user()->role=='manager'){
        $team=DB::table('teams')
        ->join('users','teams.manager','=','users.username')
        ->select('teams.*','users.*')
        ->where('teams.manager',Auth::user()->username)
        ->get();
        $players=DB::table('players')
        ->join('teams','players.team','=','teams.team')
        ->select('players.*','teams.*')
        ->where('teams.manager',Auth::user()->username)
        ->get();
        
        return view('team.manager',compact('team','players'));
    }
else{
Toastr::error('This section is Reserved for Particular User','Error!');
return back();
}
    }/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'admin'){
        $manager=User::where('role','manager')->get();
        return view('team.add-team',compact('manager'));
        }
         else {
    Toastr::warning('You do not Have a permission to go there','Warning!');
    return redirect('/');
}
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Team
     */
    public function store(Request $request)
{
    $request->validate([
    'team' => 'bail|required|unique:teams|max:255',
    'coach' => 'required',
    'manager' => 'required|unique:teams,manager',
]);
        $teams= new Team();
        $teams->team = $request->input('team');
        $teams->coach = $request->input('coach');
        $teams->manager = $request->input('manager');
        
            $save=$teams->save();
            Toastr::success('Team Have been Created','Congrats!');
            return redirect('/team');
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $team=DB::table('players')
        ->join('teams','players.team','=','teams.team_name')
        ->select('players.*','teams.*')
        ->where('teams.id',$id)
        ->get();
        return view('team.team-details',compact('team'));
    }
  public function show(Team $team)
    {
        if(Auth::user()->role == 'admin'){
        $team=DB::table('teams')
        ->join('users','teams.owner','=','users.name')
        ->select('users.*','teams.*')
        ->where('users.role','owner')
        ->get();
        return view('team.teams',compact('team'));
    }
      else {
        
    Toastr::warning('You do not Have a permission to go there',"Warning!");
    return redirect('/');
}
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team,$id)
    {
       if(Auth::user()->role == 'admin'){
        $manager=User::where('role','manager')->get();
        $teams=Team::findorfail($id);
        return view('team.edit-team',compact('manager','teams'));
        }
         else {
    Toastr::warning('You do not Have a permission to go there','Warning!');
    return redirect('/');
}

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $this->validate(request(), [
            'coach' => 'required',
            'team' => "required|unique:teams,team,$id,teams_id",
            'manager' => "required|unique:teams,manager,$id,teams_id",
        ]);

       $team=Team::findorfail($id);

        $team->team = $request->input('team');
        $team->coach = $request->input('coach');
        $team->manager = $request->input('manager');
        
            $team->save();
            Toastr::success('Team info was updated','Success!');
            return redirect('/teams');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team,$teams_id)
    {
        $team=Team::findorfail($teams_id);
        $team->delete();
        Toastr::success('Team was Deleted','Success!');
        return redirect('/teams');
    }
}
