@extends('layouts.tempat')
@section('content')    
    <div class="isi">
        <div class="row">
            <div class="ms-sm-3">
                <h3 class="title"><b>DATA WILAYAH</b></h3>
            </div>
        </div>

        <div class="row mt-sm-4">
            <div class="offset-sm-1 col-sm 3">
                <a target="_blank" href="PDFK">
                    <button type="submit" class="btn-export btn btn-outline-danger mt-sm-2">
                        <img src="../aset/IMG/export_pdf.png" width="20px">
                        EXPORT LAPORAN
                    </button>
                </a>
            </div>

            <div class="col-sm-5 me-sm-5">
                <input type="text" id="searchKecamatan" class="search form-control" placeholder="Search Kecamatan...">
            </div>

            
        </div>
            <div class="w3-responsive mt-sm-4 mb-sm-4">
                <table class="w3-table-all w3-hoverable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kecamatan</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th colspan="3" class="w3-center">Aksi</th>
                        </tr>
                    </thead>

                    @php
                        $no = 1;
                    @endphp

                    <tbody id="tampilKecamatan">
                        @foreach ($data as $d)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $d->Nama_Kecamatan }}</td>
                                <td>{{ $d->Latitude }}</td>
                                <td>{{ $d->Longitude }}</td>
                                <td>
                                    <a href="/kelolaKecamatan/d/{{ $d->id_kecamatan }}" class='btn btn-danger' id=''><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                                <td>
                                    <a href='/KelolaKecamatan/u/{{ $d->id_kecamatan }}' class='btn btn-primary'><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
