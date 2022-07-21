<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class ClusteringController extends Controller
{
    protected $Cek1,$Cek2,$Cek3,$Cek4;
    protected $C1,$C2,$C3,$C4;
    protected $HC1,$HC2,$HC3,$HC4;
    
    
    public function clustering(){
        $count = $this->count();
        for($i=0;$i<$count;$i++){
            $ClusterAwal[] = 1;
        }

        $data = DB::table('datacovid')->get();
        // Centeroid Awal
            $this->Cek1 = $this->CekData(0,'=','');
            $this->Cek2 = $this->CekData(1,2,'between');
            $this->Cek3 = $this->CekData(3,5,'between');
            $this->Cek4 = $this->CekData(6,'>=','');
        // end Centeroid Awal
        
        // Penentuan centeroid awal
            if($this->Cek1->isNotEmpty()){
                $this->C1 = $this->Purity($this->Cek1);
            }
            
            if($this->Cek2->isNotEmpty()){
                $this->C2 = $this->Purity($this->Cek2);
            }
            
            if($this->Cek3->isNotEmpty()){
                $this->C3 = $this->Purity($this->Cek3);
            }
            
            if($this->Cek4->isNotEmpty()){
                $this->C4 = $this->Purity($this->Cek4);
            }
        // end penentuan centeroid awal

        $status = true;
        while($status){
            $j = 0;
            foreach($data as $d){
                // perhitungan k-means
                    if($this->Cek1->isNotEmpty()){
                        $this->HC1 = sqrt(pow($d->Dalam_Perawatan - $this->C1[0],2)+
                                        pow($d->Isolasi_Mandiri - $this->C1[1],2)+
                                        pow($d->Meninggal - $this->C1[2],2));
                    }

                    if($this->Cek2->isNotEmpty()){
                        $this->HC2 = sqrt(pow($d->Dalam_Perawatan - $this->C2[0],2)+
                                        pow($d->Isolasi_Mandiri - $this->C2[1],2)+
                                        pow($d->Meninggal - $this->C2[2],2));
                    }

                    if($this->Cek3->isNotEmpty()){
                        $this->HC3 = sqrt(pow($d->Dalam_Perawatan - $this->C3[0],2)+
                                        pow($d->Isolasi_Mandiri - $this->C3[1],2)+
                                        pow($d->Meninggal - $this->C3[2],2));
                    }

                    if($this->Cek4->isNotEmpty()){
                        $this->HC4 = sqrt(pow($d->Dalam_Perawatan - $this->C4[0],2)+
                                        pow($d->Isolasi_Mandiri - $this->C4[1],2)+
                                        pow($d->Meninggal - $this->C4[2],2));
                    }
                // end perhitungan k-means
                
                // update clustering
                    if($this->Cek1->isNotEmpty() && $this->Cek2->isNotEmpty() && $this->Cek3->isNotEmpty() && $this->Cek4->isNotEmpty()){
                        if($this->HC1 < $this->HC2 && $this->HC1 < $this->HC3 && $this->HC1 < $this->HC4){
                            $ClusterAkhir[$j] = 'C1';
                            $this->UpdateCluster('C1', $d->id_covid);
                        }else if($this->HC2 < $this->HC3 && $this->HC2 < $this->HC4){
                            $ClusterAkhir[$j] = 'C2';
                            $this->UpdateCluster('C2', $d->id_covid);
                        }else if($this->HC3 < $this->HC4){
                            $ClusterAkhir[$j] = 'C3';
                            $this->UpdateCluster('C3', $d->id_covid);
                        }else{
                            $ClusterAkhir[$j] = 'C4';
                            $this->UpdateCluster('C4', $d->id_covid);
                        }   
                    }else if($this->Cek1->isNotEmpty() && $this->Cek2->isNotEmpty() && $this->Cek3->isNotEmpty()){
                        if($this->HC1 < $this->HC2 && $this->HC1 < $this->HC3 && $this->HC1){
                            $ClusterAkhir[$j] = 'C1';
                            $this->UpdateCluster('C1', $d->id_covid);
                        }else if($this->HC2 < $this->HC3 && $this->HC2){
                            $ClusterAkhir[$j] = 'C2';
                            $this->UpdateCluster('C2', $d->id_covid);
                        }else {
                            $ClusterAkhir[$j] = 'C3';
                            $this->UpdateCluster('C3', $d->id_covid);
                        }
                    }else if($this->Cek1->isNotEmpty() && $this->Cek2->isNotEmpty() && $this->Cek4->isNotEmpty()){
                        if($this->HC1 < $this->HC2 && $this->HC1 < $this->HC4){
                            $ClusterAkhir[$j] = 'C1';
                            $this->UpdateCluster('C1', $d->id_covid);
                        }else if($this->HC2 < $this->HC4){
                            $ClusterAkhir[$j] = 'C2';
                            $this->UpdateCluster('C2', $d->id_covid);
                        }else{
                            $ClusterAkhir[$j] = 'C4';
                            $this->UpdateCluster('C4', $d->id_covid);
                        }   
                    }else if($this->Cek1->isNotEmpty() && $this->Cek3->isNotEmpty() && $this->Cek4->isNotEmpty()){
                        if($this->HC1 < $this->HC3 && $this->HC1 < $this->HC4){
                            $ClusterAkhir[$j] = 'C1';
                            $this->UpdateCluster('C1', $d->id_covid);
                        }else if($this->HC3 < $this->HC4){
                            $ClusterAkhir[$j] = 'C3';
                            $this->UpdateCluster('C3', $d->id_covid);
                        }else{
                            $ClusterAkhir[$j] = 'C4';
                            $this->UpdateCluster('C4', $d->id_covid);
                        }   
                    }else if($this->Cek2->isNotEmpty() && $this->Cek3->isNotEmpty() && $this->Cek4->isNotEmpty()){
                        if($this->HC2 < $this->HC3 && $this->HC2 < $this->HC4){
                            $ClusterAkhir[$j] = 'C2';
                            $this->UpdateCluster('C2', $d->id_covid);
                        }else if($this->HC3 < $this->HC4){
                            $ClusterAkhir[$j] = 'C3';
                            $this->UpdateCluster('C3', $d->id_covid);
                        }else{
                            $ClusterAkhir[$j] = 'C4';
                            $this->UpdateCluster('C4', $d->id_covid);
                        }   
                    }else if($this->Cek1->isNotEmpty() && $this->Cek2->isNotEmpty()){
                        if($this->HC1 < $this->HC2){
                            $ClusterAkhir[$j] = 'C1';
                            $this->UpdateCluster('C1', $d->id_covid);
                        }else{
                            $ClusterAkhir[$j] = 'C2';
                            $this->UpdateCluster('C2', $d->id_covid);
                        }   
                    }else if($this->Cek1->isNotEmpty() && $this->Cek4->isNotEmpty()){
                        if($this->HC1 < $this->HC4){
                            $ClusterAkhir[$j] = 'C1';
                            $this->UpdateCluster('C1', $d->id_covid);
                        }else{
                            $ClusterAkhir[$j] = 'C4';
                            $this->UpdateCluster('C4', $d->id_covid);
                        }   
                    }else if($this->Cek3->isNotEmpty() && $this->Cek4->isNotEmpty()){
                        if($this->HC3 < $this->HC4){
                            $ClusterAkhir[$j] = 'C3';
                            $this->UpdateCluster('C3', $d->id_covid);
                        }else{
                            $ClusterAkhir[$j] = 'C4';
                            $this->UpdateCluster('C4', $d->id_covid);
                        }   
                    }else if($this->Cek2->isEmpty() && $this->Cek3->isEmpty() && $this->Cek4->isEmpty()){
                        $ClusterAkhir[$j] = 'C1';
                        $this->UpdateCluster('C1', $d->id_covid);
                    }else if($this->Cek1->isEmpty() && $this->Cek3->isEmpty() && $this->Cek4->isEmpty()){
                        $ClusterAkhir[$j] = 'C2';
                        $this->UpdateCluster('C2', $d->id_covid);
                    }else if($this->Cek1->isEmpty() && $this->Cek2->isEmpty() && $this->Cek4->isEmpty()){
                        $ClusterAkhir[$j] = 'C3';
                        $this->UpdateCluster('C3', $d->id_covid);   
                    }else if($this->Cek2->isEmpty() && $this->Cek3->isEmpty() && $this->Cek1->isEmpty()){
                        $ClusterAkhir[$j] = 'C4';
                        $this->UpdateCluster('C4', $d->id_covid);
                    }
                    $j++;
                // end update clustering
            }
            $status = true;
            for($j=0;$j<$count;$j++){
                if($ClusterAwal[$j] != $ClusterAkhir[$j]){
                    $status = false;
                    $ClusterAwal = $ClusterAkhir;
                }
            }
        }
    }

    private function count(){
        $count = DB::table('datacovid')->get();
        return count($count);
    }

    private function UpdateCluster($cluster, $id){
        DB::table('datacovid')->where('id_covid', $id)->update([
            'zona' => $cluster
        ]);
    }

    private function CekData($angka1, $angka2, $cek){
        if($cek === ''){
            $data = DB::table('datacovid')->where('Total',$angka2,$angka1)->get();
        }else{
            $data = DB::table('datacovid')->whereBetween('Total', [$angka1, $angka2])->get();
        }
        return $data; 
    }

    private function Purity($data){
        foreach($data as $d){
            $HP = ((1/($d->Dalam_Perawatan + $d->Isolasi_Mandiri + $d->Meninggal))*max($d->Dalam_Perawatan,$d->Isolasi_Mandiri,$d->Meninggal));
            $this->UpdatePurity($d->id_covid,round($HP,6));
        }
        
        foreach($data as $d){
            $purity[] = $d->Purity;
        }
        
        $Hasil = DB::table('datacovid')->where('Purity',max($purity))->limit(1)->get();
        foreach ($Hasil as $h){
            return [$h->Dalam_Perawatan,$h->Isolasi_Mandiri,$h->Meninggal];
        }
    }
    
    private function UpdatePurity($id,$nilaiPurity){
        DB::table('datacovid')->where('id_covid',$id)->update([
            'Purity' => $nilaiPurity
        ]);
    }
}
