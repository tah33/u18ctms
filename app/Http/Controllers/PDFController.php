<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fee;
use PDF;
use App\Match;
use App\Player;
use App\Point;
use App\Result;
use App\Run;
use DB;
class PDFController extends Controller
{
    public function fee()
    {
    $fees= Fee::all();
    $pdf = PDF::loadView('pdf.fee', compact('fees'));
    return $pdf->download('Fee_Report.pdf');
    }

    public function match()
    {
    $matches= Match::all();
    $pdf = PDF::loadView('pdf.match', compact('matches'));
    return $pdf->download('Match_Report.pdf');
    }

    public function player()
    {
    $players= Player::all();
    $pdf = PDF::loadView('pdf.player', compact('players'));
    return $pdf->download('Player_Report.pdf');
    }

    public function point()
    {
    $points= Point::all();
    $pdf = PDF::loadView('pdf.point', compact('points'));
    return $pdf->download('Point_Table.pdf');
    }

    public function result()
    {
    $results= Result::all();
    $pdf = PDF::loadView('pdf.result', compact('results'));
    return $pdf->download('Results.pdf');
    }

    public function run()
    {
    $runs= Run::all();
    $pdf = PDF::loadView('pdf.run', compact('runs'));
    return $pdf->download('Run.pdf');
    }
    public function results()
    {
    $results=DB::table('runs')
       ->join('results', 'runs.match_name', '=', 'results.match_name')
       ->join('points', 'runs.match_name', '=', 'points.match_name')
        ->select('runs.*','results.result','points.points')->groupBy('id')
        ->get();
    $pdf = PDF::loadView('pdf.results', compact('results'));
    return $pdf->download('All_Match_Results.pdf');
    }
}
