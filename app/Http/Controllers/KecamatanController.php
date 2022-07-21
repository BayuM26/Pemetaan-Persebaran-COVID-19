<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    protected $data;
    public function __constrac(){
        $this->middelware('auth');
    }

    public function index(){
        $this->data = DB::table('kecamatan')->get();
        return view('admin_S3PM.DataKecamatan', [
            'title' => 'Kelola Kecamatan',
            'data' => $this->data,
        ]);
    }

    public function input(Request $request){
        DB::table('kecamatan')->insert([
            'Nama_Kecamatan' => $request->nama_kecamatan,
            'Latitude' => $request->latitude,
            'Longitude' => $request->longitude
        ]);

        return redirect('KelolaKecamatan')->with('toast_success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id){
        $this->data = DB::table('kecamatan')->where('id_kecamatan', $id)->get();
        return view('admin_S3PM/updateDataKecamatan',[
            'title' => 'Update Kecamatan',
            'data' => $this->data,
        ]);
    }

    public function update($id, Request $request){
        DB::table('kecamatan')->where('id_kecamatan', $id)->update([
            'Nama_Kecamatan' => $request->NamaKecamatan,
            'Latitude' => $request->latitude,
            'Longitude' => $request->longitude,
        ]);

        return redirect('KelolaKecamatan')->with('toast_success', 'Data Behasil di Update');
    }

    public function delete($id){
        DB::table('kecamatan')->where('id_kecamatan', $id)->delete();

        return redirect('KelolaKecamatan')->with('toast_success', 'Data Berhasil di Hapus');
    }
}
