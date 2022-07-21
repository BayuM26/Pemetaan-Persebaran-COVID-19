<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $data;

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $this->data = DB::table('users')->get();    
        return view('admin.admin',[
            'title' => 'Kelola Admin',
            'dataUser' => $this->data
        ]);
    }

    public function inputAdmin(Request $request){
        DB::table('users')->insert([
            'name' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'hak_akses' => $request->hakAkses,
            'remember_token' => $request->_token    
        ]);
        return redirect('/admin')->with('toast_success','Data Berhasil Ditambah');
    }

    public function edit($id){
        $this->data = DB::table('users')->where('id_user',$id)->get();
        return view('admin.editAdmin',[
            'title' => 'Update Data User',
            'dataUser' => $this->data,
        ]);
    }

    public function update(Request $request){
        DB::table('users')->where('id_user',$request->id)->update([
            'name' => $request->nama,
            'username' => $request->username,
            'hak_akses' => $request->hak_akses
        ]);

        return redirect('/admin')->with('toast_success','Data Berhasil di Update');
    }

    public function delete($id){
        DB::table('users')->where('id_user', $id)->delete();
        return redirect('/admin')->with('toast_success','Data Berhasil di Hapus');
    }
}
