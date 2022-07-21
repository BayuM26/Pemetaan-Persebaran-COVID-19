<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Http\Controllers\DataCovidController;

class ImportController extends DataCovidController
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function import(Request $request){
        $file = $request->file('importfile');

        $reader = IOFactory::createReaderForFile($file->getRealPath());
        $spreadsheet = $reader->load($file->getRealPath());

        $data = $spreadsheet->getActiveSheet()->toArray();
        
        for($i=3; $i<count($data); $i++){
            $kecamatan = (string)$data[$i][1];
            $dalamPerawatan = (int)$data[$i][2];
            $isolasimandiri = (int)$data[$i][3];
            $sembuh = (int)$data[$i][4];
            $meninggal = (int)$data[$i][5];

            $cek = DB::table('datacovid')->where('Kecamatan', $kecamatan)->get();
            if($cek){
                DB::table('datacovid')->where('Kecamatan', $kecamatan)->update([
                    'Kecamatan' => $kecamatan,
                    'Dalam_Perawatan' => $dalamPerawatan,
                    'Isolasi_Mandiri' => $isolasimandiri,
                    'Sembuh' => $sembuh,
                    'Meninggal' => $meninggal,
                    'Total' => $dalamPerawatan+$isolasimandiri,
                ]);
            }else{
                DB::table('datacovid')->insert([
                    'Kecamatan' => $kecamatan,
                    'Dalam_Perawatan' => $dalamPerawatan,
                    'Isolasi_Mandiri' => $isolasimandiri,
                    'Sembuh' => $sembuh,
                    'Meninggal' => $meninggal,
                    'Total' => $dalamPerawatan+$isolasimandiri,
                ]);
            }
            $this->clustering();
            return redirect('KelolaDataCOVID')->with('toast_success', 'Data Behasil di Upload');
        }  
    }
}
