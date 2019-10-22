<?php

namespace App\Http\Controllers;
use App\Result;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Fee;
use App\Run;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results=DB::table('teams')->join('matches', function ($join) {
            $join->on('teams.team', '=', 'matches.team1')->orOn('teams.team', '=', 'matches.team2');
        })
       ->join('results', 'matches.match_name', '=', 'results.match_name')
        ->select('results.*')
        ->where('teams.manager',Auth::user()->username)
        
        ->get();

        return view('result.result',compact('results'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $results=DB::table('runs')
       ->join('results', 'runs.match_name', '=', 'results.match_name')
       ->join('points', 'runs.match_name', '=', 'points.match_name')
        ->select('runs.*','results.result','points.points')->groupBy('id')
        ->get();

        return view('result.match_result',compact('results'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        $results=Result::all();
        return view('result.results',compact('results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
