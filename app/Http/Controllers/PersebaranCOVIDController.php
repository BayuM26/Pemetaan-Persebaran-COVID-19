<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PersebaranCOVIDController extends Controller
{
    public function index(){
        $sum=DB::table('datacovid')->select([
            DB::raw('SUM(Dalam_perawatan) as DP'),
            DB::raw('SUM(Isolasi_Mandiri) as IM'),
            DB::raw('SUM(Meninggal) as M'),
            DB::raw('SUM(Sembuh) as S'),
        ])->get();
        
        $zonaC1 = DB::table('datacovid')->where('zona','C1')->count();
        $zonaC2 = DB::table('datacovid')->where('zona','C2')->count();
        $zonaC3 = DB::table('datacovid')->where('zona','C3')->count();
        $zonaC4 = DB::table('datacovid')->where('zona','C4')->count();
        $total = DB::table('datacovid')->select('zona')->count();

        $data = DB::table('datacovid')->get();

        return view('Persebaran',[
            'title' => 'Persebaran COVID-19',
            'count' => $sum,
            'data' => $data,
            'zona1' => round(($zonaC1/$total)*100,2),
            'zona2' => round(($zonaC2/$total)*100,2),
            'zona3' => round(($zonaC3/$total)*100,2),
            'zona4' => round(($zonaC4/$total)*100,2),
        ]);
    }
    
}
