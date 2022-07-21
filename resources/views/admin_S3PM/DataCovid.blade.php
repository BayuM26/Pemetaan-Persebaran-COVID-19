@extends('layouts.tempat')

@section('content')
            <div class="isi">
                <div class="row">
                    <div class="ms-sm-3">
                        <h3 class="title"><b>DATA COVID-19</b></h3>
                    </div>
                </div>

                <div class="row mt-sm-4">
                    <div class="offset-sm-1 col-sm-4">
                        <button class="btn-input btn btn-tambahdatacovid mb-sm-2" data-bs-toggle="modal" data-bs-target="#modalTambahDatacovid">Masukan Data Covid-19</button>
                        
                        <div>
                            <button class="btn-input btn btn-tambahdatacovid mb-sm-2" data-bs-toggle="modal" data-bs-target="#modalimportDatacovid">Import Data Covid-19</button>
                        </div>
                    </div>
    
                    <div class="offset-sm-1 col-sm-5">
                        <input type="text" id="searchkecamatanDataCovid" class="input-search form-control mb-sm-2" placeholder="Search Kecamatan...">
                        
                        <a target="_blank" href="EXCEL">
                            <button class="btn-export btn btn-outline-success w3-right mt-sm-2">
                                <img src="../aset/IMG/export.png" width="30px">
                                EXPORT DATA
                            </button>
                        </a>
                        <a target="_blank" href="PDF">
                            <button type="submit" class="btn-export btn btn-outline-danger mt-sm-2">
                                <img src="../aset/IMG/export_pdf.png" width="20px">
                                EXPORT LAPORAN
                            </button>
                        </a>
                    </div>
                </div>

                <div class="w3-responsive mt-sm-4 mb-sm-4">
                    <table class="w3-table-all w3-hoverable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kecamatan</th>
                                <th>Dalam Perawatan</th>
                                <th>Isolasi Mandiri</th>
                                <th>Sembuh</th>
                                <th>Meninggal</th>
                                <th>Total</th>
                                <th>Zona</th>
                                <th colspan="2">Aksi</th>
                            </tr>
                        </thead>

                        @php
                            $no=1;
                        @endphp

                        <tbody id="tampilDataCovid">
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $d->Kecamatan }}</td>
                                    <td>{{ $d->Dalam_Perawatan }}</td>
                                    <td>{{ $d->Isolasi_Mandiri }}</td>
                                    <td>{{ $d->Sembuh }}</td>
                                    <td>{{ $d->Meninggal }}</td>
                                    <td>{{ $d->Total+$d->Sembuh+$d->Meninggal }}</td>
                                    <td>{{ ($d->zona == 'C1' ? 'HIJAU' : ($d->zona == 'C2' ? 'KUNING' : ($d->zona == 'C3' ? 'JINGGA' : 'MERAH')))}}</td>
                                    <td>
                                        <a href='/KelolaDataCOVID/d/{{ $d->id_covid }}' class='btn btn-danger'>
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a href='/KelolaDataCOVID/u/{{ $d->id_covid }}' class='btn btn-primary'>
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
       
    <!-- modal -->
        <!-- modal input data covid-->
            <div class="modal fade w3-animate-opacity" id="modalTambahDatacovid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"><b> Masukan Data COVID-19 </b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                        
                        <form action="KelolaDataCOVID" method="post">
                        @csrf    
                        <div class="modal-body">
                            <div class="mt-sm-3">
                                <label for="kecamatan">Kecamatan</label>
                                <div class="input-group">

                                <select class="form-select" name="kecamatan" id="inputGroupSelect04" aria-label="Example select with button addon" required>
                                    <option disabled selected value="">Pilih Kecamatan....</option>
                                    @foreach ($datak as $d)
                                        @php
                                            $namaKecamatan = str_replace(' ', '', $d->Nama_Kecamatan);
                                        @endphp
                                        <option value="{{ $d->id_kecamatan }}">{{ $namaKecamatan }}</option>
                                    @endforeach
                                </select>

                                <button class="btn btn-outline-secondary" type="button" data-bs-toggle="modal" data-bs-target="#modalTambahKecamatan"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            <div class="mt-sm-3">
                                <label for="Perawataan mt-lg-4">Jumlah Dalam Perawatan</label>
                                <input type="number" class="form-control perawatan" name="dalamPerawatan" autocomplete="off" placeholder="Masukan Jumlah Dalam Perawatan" required>
                            </div>

                            <div class="mt-sm-3">
                                <label for="mandiri mt-lg-4">Jumlah Isolasi Mandiri</label>
                                <input type="number" class="form-control mandiri" name="isolasiMandiri"  autocomplete="off" placeholder="Masukan Jumlah Isolasi Mandiri" required>
                            </div>

                            <div class="mt-sm-3">
                                <label for="sembuh mt-lg-4">Jumlah Sembuh</label>
                                <input type="number" class="form-control sembuh" name="sembuh"  autocomplete="off" placeholder="Masukan Jumah Sembuh..." required>
                            </div>

                            <div class="mt-sm-3">
                                <label for="sembuh mt-lg-4">Jumlah Meninggal</label>
                                <input type="number" class="form-control meninggal" name="meninggal"  autocomplete="off" placeholder="Masukan Jumah Sembuh..." required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="btn_save" class="btn btn-save">Simpan Data Covid-19 <i class="bi bi-save2"></i><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        <!-- end modal input data covid-->

        <!-- modal import data covid-->
            <div class="modal fade w3-animate-opacity" id="modalimportDatacovid" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel"> <b> Import Data COVID-19 </b> </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="import" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="mt-sm-3 ms-sm-5">
                                    <a class="btn btn-success" href="aset/ContohDataImport.xlsx" >
                                        Contoh Data Import
                                    </a>
                                </div>

                                <div class="offset-sm-1 col-sm-10">
                                    <label for="formFile" class="form-label">  </label>
                                    <input class="form-control" name="importfile" type="file" id="formFile" accept=".xlsx, .xls">
                                </div>
                            </div>
                                
                            <div class="modal-footer">
                                <button type="submit" name="btn_import" class="btn btn-save">Import Data <i class="bi bi-save2"></i><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                   
                </div>
            </div>
        <!-- end modal import data covid-->

        <!-- modal tambah Kecamatan -->
            <div class="modal fade w3-animate-zoom" id="modalTambahKecamatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="KelolaKecamatan" method="post">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kecamatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mt-sm-3">
                                    <label for="Perawataan mt-lg-4">Nama Kecamatan</label>
                                    <input type="text" class="form-control kecamatan" name="nama_kecamatan"  autocomplete="off" placeholder="Masukan nama Kecamatan...." required>
                                </div>

                                <div class="mt-sm-3">
                                    <label for="Perawataan mt-lg-4">Latitude</label>
                                    <input type="text" class="form-control Latitude" name="latitude"  autocomplete="off" placeholder="Masukan latitude Kecamatan...." required>
                                </div>

                                <div class="mt-sm-3">
                                    <label for="Perawataan mt-lg-4">Longitude</label>
                                    <input type="text" class="form-control longitude" name="longitude"  autocomplete="off" placeholder="Masukan longitude Kecamatan...." required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="btn-save-kecamatan" class="btn btn-save">Simpan Data Kecamatan <i class="bi bi-save2"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <!-- end modal tambah kecamatan --> 
    <!-- modal -->
@endsection