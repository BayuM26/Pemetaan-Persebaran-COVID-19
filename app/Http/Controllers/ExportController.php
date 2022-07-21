<?php

namespace App\Http\Controllers;

use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class ExportController extends Controller
{
    public function exportPDF(Fpdf $pdf){
        ob_end_clean();
        $pdf->AddPage();

        // set judul kolom
            $pdf->SetFont('Arial','B',12);
            $pdf->Cell(0,5,'LAPORAN DATA WILAYAH COVID-19','0','1','C',false);
            $pdf->Ln(3);

            $pdf->SetFont('Arial','B',8);

            $pdf->Cell(5,6,'NO',1,0,'C');
            $pdf->Cell(45,6,'Kecamatan',1,0,'C');
            $pdf->Cell(25,6,'Dalam Perawatan',1,0,'C');
            $pdf->Cell(25,6,'Isolasi Mandiri',1,0,'C');
            $pdf->Cell(20,6,'Sembuh',1,0,'C');
            $pdf->Cell(20,6,'Meninggal',1,0,'C');
            $pdf->Cell(15,6,'Total',1,0,'C');
            $pdf->Cell(35,6,'Zona',1,0,'C');
            $pdf->Ln(6);
        // end set judul kolom

        // isi kolom
            $data = DB::table('datacovid')->get();
            $no =1;
            foreach ($data as $d){
                $total =    $d->Total+
                            $d->Sembuh+
                            $d->Meninggal;
                    
                $pdf->Cell(5,6,$no++,1,0,'L',False);
                $pdf->Cell(45,6,$d->Kecamatan,1,'',False);
                $pdf->Cell(25,6,$d->Dalam_Perawatan,1,'',False);
                $pdf->Cell(25,6,$d->Isolasi_Mandiri,1,'',False);
                $pdf->Cell(20,6,$d->Sembuh,1,'',False);
                $pdf->Cell(20,6,$d->Meninggal,1,'',False);
                $pdf->Cell(15,6,$total,1,'',False);
                $pdf->Cell(35,6,($d->zona === 'C1' ? 'HIJAU' : ($d->zona === 'C2' ? 'KUNING' : ($d->zona === 'C3' ? 'JINGGA' : 'MERAH'))),1,1,'',False);
            }
           
        // end isi kolom
    
        if(auth()->check()){
            // set ttd
                // atas ttd
                    $pdf->Cell(189 ,10,'',0,1);
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(59 ,4,'Karawang, '.date("d F Y"),0,1);
                // end atas ttd
    
                // jabatan yang ttd
                    $pdf->Cell(189 ,1,'',0,1);
                    $pdf->SetFont('Arial','B',10);
                    // ttd admin
                        $pdf->Cell(59 ,4,auth()->user()->name,0,1);
                    // end ttd admin
                // end jabatan yng ttd
    
                // nama ttd
                    $pdf->Cell(189 ,18,'',0,1);
                    $pdf->SetFont('Arial','B',10);
    
                    // ttd ADMIN
                        $pdf->Cell(59 ,4,'',0,1);
                    // end ttd ADMIN
                // end nama ttd
    
                // nama ttd
                    $pdf->Cell(189 ,1,'',0,1);
                    $pdf->SetFont('Arial','B',10);
    
                    // ttd admin
                        $pdf->Cell(59 ,4,'NIP. ',0,1);
                    // end ttd admin
                // end nama ttd
    
            // end set ttd
        }
    
        $pdf->Output('Data Persebaran COVID-19.pdf','I');
        exit;
    }

    public function exportExcel(){
        $data = DB::table('datacovid')->get();
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // setting style
                // style untuk judul kolom
                    $styleJudulKolom = [
                        'font'=>[
                            'color'=>[
                                'rgb'=>'000000'
                            ],
                            'bold'=>true,
                            'size'=>12
                        ],

                        'alignment'=>[
                            'horizontal'=>Alignment::HORIZONTAL_CENTER,    
                        ],

                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    ];
                // end style untuk judul kolom

                // style untuk isi kolom
                    $styleIsiKolom = [
                        'font' => [
                            'size' =>10,
                        ],

                        'alignment'=>[
                            'horizontal'=>Alignment::HORIZONTAL_LEFT,    
                        ],
                        
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => '000000'],
                            ],
                        ],
                    
                    ];
                // end style untuk isi kolom

                // style title
                    $title = [
                        'font' => [
                            'size' =>14,
                            'bold'=>true,
                        ],
                    
                        'alignment'=>[
                            'horizontal'=>Alignment::HORIZONTAL_CENTER,    
                        ],
                    ];
                // end style title
            // end setting style

            // title
                // title ebook
                    $sheet ->setCellValue('A1',"Data Covid-19 Karawang");
                    $sheet ->setCellValue('A2',"Data Kasus Konfirmasi Per-Kecamatan");

                    // style title ebook
                        $sheet->mergeCells('A1:H1');
                        $sheet->mergeCells('A2:H2');
                        $sheet->getStyle('A1')->applyFromArray($title);
                        $sheet->getStyle('A2')->applyFromArray($title);
                    // end style title ebook
                // end title ebook
            // end title

            // tanggal data
                    $sheet->setCellValue('I2',date("d F Y"));
                    $sheet->mergeCells('I2:J2');
            // end tanggal data

            // judul kolom
                // judul kolom Ebook
                    $sheet  ->setCellValue("A3","No.")
                            ->setCellValue("B3","Kecamatan")
                            ->setCellValue("C3","Dalam Perawatan")
                            ->setCellValue("D3","Isolasi Mandiri")
                            ->setCellValue("E3","Sembuh")
                            ->setCellValue("F3","Meninggal")
                            ->setCellValue("G3","Total")
                            ->setCellValue("H3","Zona");
                // end judul kolom Ebook

                // memanggil style unutk judul kolom
                    $spreadsheet->getActiveSheet()
                                ->getStyle('A3:H3')
                                ->applyFromArray($styleJudulKolom);
                //end memanggil style unutk judul kolom

                // auto size dimension
                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('A')
                                ->setAutoSize(true);

                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('B')
                                ->setAutoSize(true);

                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('C')
                                ->setAutoSize(true);

                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('D')
                                ->setAutoSize(true);

                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('E')
                                ->setAutoSize(true);

                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('F')
                                ->setAutoSize(true);

                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('G')
                                ->setAutoSize(true);

                    $spreadsheet->getActiveSheet()
                                ->getColumnDimension('H')
                                ->setAutoSize(true);
                // end auto size dimention
            // end judul kolom

            // isi kolom
                // isi kolom data covid 19
                                          
                    $angka = 4;
                    $no = 1;
                    
                    $C1 = "C1";
                    $C2 = "C2";
                    $C3 = "C3";
                    $C4 = "C4";

                    $hijau = "HIJAU";
                    $kuning = "KUNING";
                    $jingga = "JINGGA";
                    $merah = "MERAH";
                  
                    foreach($data as $d){
                        $total = $d->Total + $d->Dalam_Perawatan + $d->Isolasi_Mandiri;
                        $sheet  ->setCellValue("A".$angka,$no)
                                ->setCellValue("B".$angka,$d->Kecamatan)
                                ->setCellValue("C".$angka,$d->Dalam_Perawatan)
                                ->setCellValue("D".$angka,$d->Isolasi_Mandiri)
                                ->setCellValue("E".$angka,$d->Sembuh)
                                ->setCellValue("F".$angka,$d->Meninggal)
                                ->setCellValue("G".$angka,$total)
                                ->setCellValue("H".$angka,'=IF("'.$d->zona.'" = "'.$C1.'", "'.$hijau.'", IF("'.$d->zona.'" = "'.$C2.'", "'.$kuning.'", IF("'.$d->zona.'" = "'.$C3.'", "'.$jingga.'", IF("'.$d->zona.'" = "'.$C4.'", "'.$merah.'"))))'); 
                                     
                            $angka++;
                            $no++;
                    }
                    

                    $angka = $angka - 1;
                    // style unutk isi kolom Ebook
                        $spreadsheet->getActiveSheet()
                                    ->getStyle('A4:H'.$angka)
                                    ->applyFromArray($styleIsiKolom);
                    //end style unutk isi kolom covid-19
                // end isi kolom data covid-19
            // end isi kolom

            // SIMPAN FILE
                header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
                header("Content-Disposition: attachment;filename=\"DATA KECAMATAN TERDAMPAK COVID-19.xlsx\"");
            // END SIMPAN FILE

            $writer = IOFactory::createWriter($spreadsheet, "Xlsx");
            $writer->save('php://output');
    }

    public function KExportPDF(Fpdf $pdf){
        $data = DB::table('kecamatan')->get();
        ob_end_clean();
        $pdf->AddPage();

            // set judul kolom
                $pdf->SetFont('Arial','B',12);
                $pdf->Cell(0,5,'DATA KECAMATAN KABUPATEN KARAWANG','0','1','C',false);
                $pdf->Ln(3);

                $pdf->SetFont('Arial','B',8);

                $pdf->Cell(45,6,'',0,0,'C');
                $pdf->Cell(5,6,'NO',1,0,'C');
                $pdf->Cell(45,6,'Kecamatan',1,0,'C');
                $pdf->Cell(25,6,'latitude',1,0,'C');
                $pdf->Cell(25,6,'longitude',1,0,'C');
                $pdf->Ln(6);
            // end set judul kolom

            // isi kolom
                                            
                $no = 1;
                foreach($data as $d){
                    $pdf->Cell(45,6,'',0,0,'');  
                    $pdf->Cell(5,6,$no++,1,0,'L',False);
                    $pdf->Cell(45,6,$d->Nama_Kecamatan,1,'',False);
                    $pdf->Cell(25,6,$d->Latitude,1,'',False);
                    $pdf->Cell(25,6,$d->Longitude,1,1,'',False); 
                }                            
                
            // end isi kolom

            // set ttd
                // atas ttd
                    $pdf->Cell(189 ,10,'',0,1);
                    $pdf->SetFont('Arial','B',10);
                    $pdf->Cell(59 ,4,'Karawang, '.date("d F Y"),0,1);
                // end atas ttd

                // jabatan yang ttd
                    $pdf->Cell(189 ,1,'',0,1);
                    $pdf->SetFont('Arial','B',10);
                    // ttd pustakawan
                        $pdf->Cell(59 ,4,auth()->user()->name,0,1);
                    // end ttd pustakawan
                // end jabatan yng ttd

                // nama ttd
                    $pdf->Cell(189 ,18,'',0,1);
                    $pdf->SetFont('Arial','B',10);

                    // ttd ADMIN
                        $pdf->Cell(59 ,4,'',0,1);
                    // end ttd ADMIN
                // end nama ttd

                // nama ttd
                    $pdf->Cell(189 ,1,'',0,1);
                    $pdf->SetFont('Arial','B',10);

                    // ttd pustakawan
                        $pdf->Cell(59 ,4,'NIP. ',0,1);
                    // end ttd pustakawan
                // end nama ttd
            // end set ttd
            $pdf->Output('Data Kecamatan.pdf','I');
    }
}
