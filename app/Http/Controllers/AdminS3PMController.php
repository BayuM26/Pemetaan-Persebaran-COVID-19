<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AdminS3PMController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $data = DB::table('datacovid')->get();
        return view('admin_S3PM/dashboard',[
            'title' => 'Dashboard',
            'data' => $data,
        ]);
    }
}
