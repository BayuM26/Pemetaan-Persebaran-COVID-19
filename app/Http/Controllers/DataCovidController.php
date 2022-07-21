<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Worksheet\Row;
use App\Http\Controllers\ClusteringController;

class DataCovidController extends ClusteringController
{
    protected $data, $datak, $count;

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $this->data = DB::table('datacovid')->get();
        $this->datak = DB::table('kecamatan')->orderBy('Nama_Kecamatan')->get();
        return view('admin_S3PM/DataCovid',[
            'title' => 'COVID-19',
            'data' => $this->data,
            'datak' => $this->datak,
        ]);
    }

    public function input(Request $request){
        $dataKecamatan = DB::table('kecamatan')->where('id_kecamatan',$request->kecamatan)->get();
        foreach($dataKecamatan as $dk){
            $cek = DB::table('datacovid')->where('kecamatan', $dk->Nama_Kecamatan)->get();
            
            if($cek){
                DB::table('datacovid')->where('kecamatan', $dk->Nama_Kecamatan)->update([
                    'id_kecamatan' => $dk->id_kecamatan,
                    'Kecamatan' => $dk->Nama_Kecamatan,
                    'Dalam_Perawatan' => $request->dalamPerawatan,
                    'Isolasi_Mandiri' => $request->isolasiMandiri,
                    'Sembuh' => $request->sembuh,
                    'Meninggal' => $request->meninggal,
                    'Total' => $request->isolasiMandiri+$request->dalamPerawatan,
                ]);
            }else{
                DB::table('datacovid')->insert([
                    'id_kecamatan' => $dk->id_kecamatan,
                    'Kecamatan' => $dk->Nama_Kecamatan,
                    'Dalam_Perawatan' => $request->dalamPerawatan,
                    'Isolasi_Mandiri' => $request->isolasiMandiri,
                    'Sembuh' => $request->sembuh,
                    'Meninggal' => $request->meninggal,
                    'Total' => $request->isolasiMandiri+$request->dalamPerawatan,
                ]);    
            }
        }
        $this->clustering();
        return redirect('KelolaDataCOVID')->with('toast_success', 'Data Berhasil di Tambahkan');
    }

    public function delete($id){
        DB::table('datacovid')->where('id_covid', $id)->delete();
        return redirect('KelolaDataCOVID')->with('toast_success','Data Berhasil di Hapus');
    }

    public function update($id){
        $this->data = DB::table('datacovid')->where('id_covid', $id)->get();
        return view('admin_S3PM/updateDataCovid',[
            'title' => 'Update Data COVID-19',
            'data' => $this->data,
        ]);
    }

    public function edit($id, Request $request){
        DB::table('datacovid')->where('id_covid',$id)->update([
            'Dalam_Perawatan' => $request->dalamPerawatan,
            'Isolasi_Mandiri' => $request->isolasiMandiri,
            'Sembuh' => $request->sembuh,
            'Meninggal' => $request->meninggal,
            'Total' => $request->isolasiMandiri+$request->dalamPerawatan,
        ]);
        return redirect('/KelolaDataCOVID')->with('toast_success', 'Data Berhasil di Update');
    }
}
