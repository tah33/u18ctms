<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Http\Request;
use Toastr;
use Auth;
use App\Fee;
class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Fee::where('round', 'final')->get();

$list = []; 

foreach ($teams as $key => $team) {
    $list[]=$team->team;
}

dd($list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role == 'manager'){
        return view('venue.add_venue');
    }
    else{
        Toastr::warning('Sorry you cannot go there','Warning!');
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
    'name' => 'required|max:255|unique:venues',
]); 
        
        $venues= new Venue();
        $venues->name = $request->input('name');
        if ($venues->name);
        {
        
              if($venues->name == 'Bangabandhu Stadium' || $venues->name == 'Sher-e-Bangla Stadium'){
                $venues->location = 'Dhaka';
            }
             if($venues->name == 'M. A. Aziz Stadium' || $venues->name == 'Zohur Ahmed Chowdhury Stadium'){
                $venues->location = 'Chittagong';
            }
             if($venues->name == 'Khan Shaheb Osman Ali Stadium'){
                $venues->location = 'Fatullah';
            }
             if($venues->name == 'Shaheed Chandu Stadium' ){
                $venues->location = 'Bogra';
            }
             if($venues->name == 'Sheikh Abu Naser Stadium' ){
                $venues->location = 'Khulna';
            }
             if($venues->name == 'Sylhet International Cricket Stadium'){
                $venues->location = 'Sylhet';
            }
            
        $venues->save();
        }
Toastr::success('Venue Has Been created','Success!');
return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        $venue=Venue::all();
        return view('venue.venues',compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
