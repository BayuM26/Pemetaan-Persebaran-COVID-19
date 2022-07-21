@extends('layouts.tempat')
@section('content')    
    <div class="isi ">
    <div class="row">
        <div class="btn-kontak">
            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-danger w3-right">Kontak Layanan</button>
        </div>
    </div>
        <!-- total  -->
            @foreach ($count as $c)    
                <div class="row">
                    <div class="offset-sm-1 col-sm-10 w3-center">
                        <h1>
                            <b class="konfirmasi count">
                                {{ $c->DP+$c->IM+$c->M+$c->S }}
                            </b>
                        </h1>
                        <b class="konfirmasi">KONFIRMASI</b>
                    </div>
                </div>

                <div class="row">
                    <div class="offset-sm-1 col-sm-5 w3-center">
                        <h1>
                            <b class="dalamperawatan count">
                                {{ $c->DP }}
                            </b>
                        </h1>
                        <b class="dalamperawatan">DALAM PERAWATAN</b>
                    </div>

                    <div class="col-sm-5 w3-center">
                        <h1>
                            <b class="isolasimandiri count">
                                {{ $c->IM }}
                            </b>
                        </h1>
                        <b class="isolasimandiri">ISOLASI MANDIRI</b>
                    </div>
                </div>

                <div class="row mt-sm-3 mb-sm-4">
                    <div class="offset-sm-1 col-sm-5 w3-center">
                        <h1>
                            <b class="sembuh count">
                                {{ $c->S }}
                            </b>
                        </h1>
                        <b class="sembuh">SEMBUH</b>
                    </div>

                    <div class="col-sm-5 w3-center">
                        <h1>
                            <b class="meninggal count">
                                {{ $c->M }}
                            </b>
                        </h1>
                        <b class="meninggal">MENINGGAL</b>
                    </div>
                </div>
            @endforeach
            
        <!-- end total -->

        <!-- pemetaan persebaran covid-19 -->
            
            <div class="card Jarak">
                <div class="card-body">
                    <label for="tabel_menu_utama" class="mb-sm-3">
                        <h3 class="tabel_menu_utama"><b>Peta Prsebaran Covid-19 Per Kecamatan di Karawang</b></h3>
                    </label>
                    <div id="map"></div>

                    @include('map')
                </div>
            </div>
        <!-- end pemetaan persebaran covid-19 -->

        <!-- grafik data covid-19 per kecamatan -->
            <div class="card jarak w3-responsive">
                <div class="card-body">
                    <label for="tabel_menu_utama" class="mb-sm-3">
                        <h3 class="tabel_menu_utama"><b>Grafik Prsebaran Covid-19 Per Kecamatan di Karawang</b></h3>
                    </label>

                    <div class="chart">
                        <canvas id="grafikDataCovid"></canvas>
                    </div>
                </div>
            </div>
        <!-- end grafik data covid-19 per kecamatan -->

        <!-- tabel persebaran data covid-19 -->
            <div class="card jarak">
                <div class="card-body">
                    <label for="tabel_menu_utama">
                        <h3 class="tabel_menu_utama"><b>Tabel Prsebaran Covid-19 Per Kecamatan di Karawang</b></h3>
                    </label>

                    <div class="row">
                        <div class="col-sm-3">
                            <a target="_blank" href="PDF">
                                <button class="btn-export btn btn-outline-danger mt-sm-1 mb-sm-3">
                                    <img src="aset/IMG/export_pdf.png" width="30px">
                                    EXPORT DATA
                                </button>
                            </a>   
                        </div>

                        <div class="offset-sm-5 col-sm-4">
                            <input type="text" id="searchAdminhalUtama" class="search form-control" placeholder="Search Nama Kecamatan...">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn w3-right" onclick="facebook();"><i class="bi bi-facebook" style="font-size: 2em;"></i></button>
                            <button class="btn w3-right" onclick="whatsapp();"><i class="bi bi-whatsapp" style="font-size: 2em;"></i></button>
                            <button class="btn w3-right" onclick="telegram();"><i class="bi bi-telegram" style="font-size: 2em;"></i></button>
                            <button class="btn w3-right" onclick="twitter();"><i class="bi bi-twitter" style="font-size: 2em;"></i></button>
                            <button class="btn w3-right" onclick="gmail();"><i class="bi bi-envelope" style="font-size: 2em;"></i></button>
                        </div>
                    </div>

                    <div class="w3-responsive">
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
                                </tr>
                            </thead>

                            @php
                                $no = 1;
                            @endphp

                            <tbody id="tampilDataCovidHalamanUtama">
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->Kecamatan }}</td>
                                        <td>{{ $d->Dalam_Perawatan }}</td>
                                        <td>{{ $d->Isolasi_Mandiri }}</td>
                                        <td>{{ $d->Sembuh }}</td>
                                        <td>{{ $d->Meninggal }}</td>
                                        <td>{{ $d->Total + $d->Sembuh + $d->Meninggal }}</td>
                                        <td>{{ $d->zona }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <!-- end tabel persebaran covid-19 per kecamatan -->
    </div>
    </div>
    </div>

    <!-- chart-->
        <script>

        var ctx = document.getElementById("grafikDataCovid");
        const dataLabel = [
            @foreach ($data as $d)
                '{{ $d->Kecamatan }}',
            @endforeach
        ];

        const dataLabellong = dataLabel.map(label => label.split(" "));
        console.log(dataLabellong);

        // Data grafik chart js
        const dataIsolasiMandiri = [
            @foreach ($data as $d)
                '{{ $d->Isolasi_Mandiri }}',
            @endforeach
        ];

        const dataDalamPerawatan = [
            @foreach ($data as $d)
                '{{ $d->Dalam_Perawatan }}',
            @endforeach
        ];
        const dataSembuh = [
            @foreach ($data as $d)
                '{{ $d->Sembuh }}',
            @endforeach
        ];

        const dataMeninggal = [
            @foreach ($data as $d)
                '{{ $d->Meninggal }}',
            @endforeach
        ];
        // end Data grafik chart js

        // data background
        background_color_isolasi_mandiri = 'rgba(152,251,152, 0.5)';
        background_color_Dalam_Perawatan = 'rgb(253, 218, 13, 0.5)';
        background_color_Sembuh = 'rgba(135,206,250, 0.5)';
        background_color_Meninggal = 'rgba(210,43,43, 0.5)';
        // end data background

        // data border
        borderColor_Isolasi_Mandiri = 'rgba(0, 0, 128, 1)';
        borderColor_Dalam_Perawatan = 'rgba(0, 0, 128, 1)';
        borderColor_sembuh = 'rgba(0, 0, 128, 1)';
        borderColor_Meninggal = 'rgba(0, 0, 128, 1)';
        // end data border

        var diagramcovid = new Chart(ctx, {
        type: 'bar',
        data: {
            
            labels: dataLabellong,
            datasets: [{
                    label:'Isolasi Mandiri',
                    data: dataIsolasiMandiri,
                    backgroundColor:background_color_isolasi_mandiri,
                    borderColor:borderColor_Isolasi_Mandiri,
                    borderWidth: 1,
                    
                },

                {
                    label:'Dalam Perawatan',
                    data: dataDalamPerawatan,
                    backgroundColor:background_color_Dalam_Perawatan,
                    borderColor:borderColor_Dalam_Perawatan,
                    borderWidth: 1,
                    
                },

                {
                    label:'Sembuh',
                    data: dataSembuh,
                    backgroundColor:background_color_Sembuh,
                    borderColor:borderColor_sembuh,
                    borderWidth: 1,
                    
                },

                {
                    label:'Meninggal',
                    data: dataMeninggal,
                    backgroundColor:background_color_Meninggal,
                    borderColor:borderColor_Meninggal,
                    borderWidth: 1,
                    
                    
                }
            ]
        },
        options: {
            maintainAspectRatio: false,
            indexAxis: 'y',
            responsive: true,
            scales: {
                        x: {
                            stacked: true,
                            ticks: {
                                font: {
                                    size:11
                                }
                            }
                        },
                        y: {
                            stacked: true,
                            ticks: {
                                font: {
                                    size:10
                                }
                            }
                        }
                    },
                
                plugins: {
                    legend: {
                        display:true,
                    position:'right',
                    align:'start',
                    }
                }
            },
            plugins:[ChartDataLabels],
        });
        </script>
    <!-- end chart -->

    <!-- modal kontak pelayanan-->  
        <div class="modal fade w3-animate-opacity" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Nomor Telepon Pelayanan COVID-19</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body w3-center">
                        <div class="mb-sm-4 contac">
                            <a class="btn btn-danger"href="tel:199">Panggilan Darurat : 199</a>
                        </div>
                        <div class="mb-sm-4 contac">
                            <a class="btn btn-danger"href="tel:08999700199">SPGDT Karawang : 08999700199</a>
                        </div>
                        <div class="mb-sm-4 contac">
                            <a class="btn btn-danger"href="tel:081388933413">Satgas Covid-19 : 081388933413</a>
                        </div>
                        <div class="mb-sm-4 contac">
                            <a class="btn btn-danger"href="tel:081388933414">Satgas Covid-19 : 081388933414</a>
                        </div>
                        <div class="mb-sm-4 contac">
                            <a class="btn btn-danger"href="tel:081388933417">Satgas Covid-19 : 081388933417</a>
                        </div>   
                    </div>

                    <div class="modal-footer">
                    </div>

                </div>
            </div>
        </div>
    <!-- end modal kontak pelayanan-->
@endsection