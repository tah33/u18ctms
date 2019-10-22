<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;
use App\Team;
use Toastr;
use DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Input;
class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $players=Player::where('id','=',$id)->get();
        return view('player.players',compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $team= Team::all();
         if(Auth::user()->role == 'manager'){
        return view('player.add_player',compact('team'));
    }
        else{
        Toastr::warning('Sorry you cannot go there','Warning!');
        return redirect('/');
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
        $min=Carbon::now()->sub('13 years')->calendar();//2006
        $max=Carbon::now()->sub('18 years')->calendar();//2001
        
        $request->validate([
    'name' => ['bail','required','max:255'],
    'bday'=>"required|after:$max|before:$min",
    'height' => ['required','regex:/^(\d{1,2})[\']?((\d)|([0-1][0-2]))?[\"]?$/'],
     'weight' => 'required',
     'category' => 'required',
     'image' =>'image',  
]);  
        $players= new Player();
        $players->name = $request->input('name');
        $players->bday = $request->input('bday');
        $players->height= $request->input('height');
        $players->weight = $request->input('weight');
        $players->batting_style = $request->input('batting_style');
        $players->bowling_style = $request->input('bowling_style');
        $players->category = $request->input('category');
        $teams=Team::where('manager','=',Auth::user()->username)->get();
        $team=$teams->first()->team;
        $players->team = $team;
        if($request->hasfile('image'))
        {
            $file=$request->File('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time() . '.' . $ext;
            $file->move('public/images/',$filename);
            $players->image=$filename;
        }
            $players->save();
            Toastr::success('Player has been saved', 'Success!');
        
        return back();
    
}
    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $players= Player::paginate(15);
        if(Auth::user()->role=='admin'){
        return view('player.all_player',compact('players'));
    }
else 
Toastr::error("You Didnt Have permission to go there,!Error");
return redirect('/');
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player,$id)
    {
        $players=Player::findorfail($id);
        $teams=Team::all();
return view('player.edit-player',compact('players','teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
$min=Carbon::now()->sub('13 years')->calendar();
        $max=Carbon::now()->sub('18 years')->calendar();
     $request->validate([
    'name' => ['bail','required','max:255','regex:/^[a-zA-Z]+(([. -][a-zA-Z ])?[a-zA-Z]*)*$/'],
    'bday'=>"required|after:$max|before:$min",
    'height' => ['required','regex:/^(\d{1,2})[\']?((\d)|([0-1][0-2]))?[\"]?$/'],
    'weight' => 'required',
    'category' => 'required',
    'image' =>'image',  
]);  
        $players=Player::find($id);
        $players->name = $request->input('name');
        $players->bday = $request->input('bday');
        $players->height= $request->input('height');
        $players->weight = $request->input('weight');
        $players->batting_style = $request->input('batting_style');
        $players->bowling_style = $request->input('bowling_style');
        $players->category = $request->input('category');
        $teams=Team::where('manager','=',Auth::user()->username)->get();
        $team=$teams->first()->team;
        $players->team = $team;
        
        if($request->hasfile('image'))
        {
            $file=$request->File('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time() . '.' . $ext;
            $file->move('public/images/',$filename);
            $players->image=$filename;
        }
        else{
            $players->image=$players->image;
        }
            $players->save();
            
        Toastr::success('Player info has been updated', 'Success!');
        
        return back();
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player,$id)
    {
         $players=Player::findorfail($id);
          $players->delete();
          Toastr::success('Player Has been Removed', 'Success!');
        
        return back();
    }
    public function captain( $id)
    { 
          $players=Player::find($id);
          $team=$players->team;
           //romoving old captain
            Player::where('captain', '=', 'Captain')
            ->where('team','=',$team)
            ->update(['captain' => null]);  
    
         $players->captain = 'Captain';
            $players->save();
        Toastr::success('Player has been Selected as Captain', 'Success!');
        return back();
       }

}
