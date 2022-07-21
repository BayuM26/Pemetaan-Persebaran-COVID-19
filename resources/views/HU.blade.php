@extends('layouts.tempat')

@section('content')
    <div class="isi">
        <div class="">
            <div class="row informationCOVID">
                <h1 style="text-align: center" class="judulcovid" id="title">
                    <b>
                        <u>APA ITU COVID-19?</u>
                    </b>
                </h1>
                <div class="col-sm-4">
                <img class="img_Covid" src="aset/IMG/covid19.png" id="img">
                </div>
                
                <div class="offset-sm-2 col-sm-6">
                    <p class="text" id="text">
                        Pada tanggal 30 Januari 2020, World Health Organization (WHO) 
                        mengklasifikasikan COVID 19 sebagai Public Health Emergency 
                        of Interational Concern (PHEIC)/Kedaruratan Kesehatan Masyarakat 
                        Yang Meresahkan Dunia (KKMMD). Pada tanggal 12 Februari 2020, WHO 
                        resmi menetapkan penyakit novel coronavirus pada manusia ini 
                        dengan sebutan Coronavirus Disase 2019 atau yang lebih di kenal 
                        dengan sebutan COVID 19 yang di sebabkan oleh Severe Acute Respiratory 
                        Syndrome Coronavirus-2 (SARS-COV2) yang termasuk dalam keluarga besar 
                        corona virus.
                    </p>
                </div>
            </div>

            <div class="row informationGejala">
                <div class="col-lg-12 gejala-container">
                    <h1 style="text-align: center" class="title2"><b><u> GEJALA UMUM COVID-19 </u></b></h1>
                    
                    <div class="row mb-sm-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_batuk" src="aset/IMG/Batuk.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6 ">
                            <h2 class="batuk">BATUK</h2>
                        </div>
                    </div>

                    <div class="row mb-sm-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_demam" src="aset/IMG/demam.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="demam">DEMAM TINGGI</h2>
                        </div>
                    </div>

                    <div class="row mb-sm-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_sk" src="aset/IMG/sakit kepala.png" height="300px" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="sakitkepala">SAKIT KEPALA</h2>
                        </div>
                    </div>

                    <div class="row mb-sm-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_st" src="aset/IMG/sakit tenggorokan.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="sakittenggorokan">SAKIT TENGGOROKAN</h2>                
                        </div>
                    </div>
                </div>
            </div>

            <div class="row informationPenularan">
                <div class="col-lg-12 penularan-container">
                    <h1 style="text-align: center" class="title3"><b><u>PENULARAN COVID-19</u></b></h1>
                    <div class="row mb-sm-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_salaman" src="aset/IMG/salaman.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="kotaklangsung">KONTAK LANGSUNG</h2>
                        </div>
                    </div>

                    <div class="row mb-sm-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_dg" src="aset/IMG/makanan mentah.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                        <h2 class="makananmentah">HINDARI MAKANAN MENTAH</h2>
                        </div>
                    </div>
                    
                    <div class="row mb-sm-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_kh" src="aset/IMG/kontak hewan.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="hewan">KONTAK HEWAN</h2>        
                        </div>
                    </div>
                </div>
            </div>

            <div class="row informationPencegahan pencegahan-container">
                <div class="col-lg-12 ">
                    <h1 style="text-align: center" class="col-lg-12 title4"><b><u>PENCEGAHAN COVID-19</u></b></h1>
                    
                    <div class="row mb-lg-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_ct" src="aset/IMG/cucitangan.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                        <h2 class="cuciTangan">Sering mencuci tangan <br> menggunakan sabun</h2>        
                        </div>
                    </div>

                    <div class="row mb-lg-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_m" src="aset/IMG/masker.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="masker">Menggunakan masker</h2>        
                        </div>
                    </div>

                    <div class="row mb-lg-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_kl" src="aset/IMG/salaman.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="hindariKontaktKangsung">hindari kontak langsung <br> dengan gejala yang mirip</h2> 
                        </div>
                    </div>
                    
                    <div class="row mb-lg-4">
                        <div class="col-lg-6">
                            <img class="img_Covid_bersin" src="aset/IMG/bersin.png" alt="" srcset="">
                        </div>

                        <div class="col-lg-6">
                            <h2 class="tutupiHidungDanMulut">selalu tutupi hidung dan mulut ketika batuk dan bersin</h2> 
                        </div>
                    </div>
                </div>
            </div>
            <a href="#login">
                <button id="buttonup">
                    <i class="fa-solid fa-angles-up"></i>
                </button>
            </a>
        </div>
    </div>
@endsection