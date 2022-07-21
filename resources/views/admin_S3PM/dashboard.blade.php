@extends('layouts.tempat')

@section('content')
        
            <div class="isi">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="diagram card">
                            <div class=" card-body">
                                <canvas class="size" id="chartDalamPerawatan"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="diagram card">
                            <div class=" card-body">
                                <canvas class="size" id="chartIsolasiMandiri"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-sm-4">
                    <div class="col-sm-6">
                        <div class=" diagram card">
                            <div class=" card-body">
                                <canvas class="size" id="Sembuh"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="diagram card">
                            <div class=" card-body">
                                <canvas class="size" id="Meninggal"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <script>
        
        // chart Dalam Perawatan
		
            var ctx = document.getElementById("chartDalamPerawatan");
			
			var diagramcovid = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [
                        @foreach ($data as $d)
                            '{{ $d->Kecamatan }}',
                        @endforeach
                    ],
					datasets: [{
							data: [
                                @foreach ($data as $d)
                                    '{{ $d->Dalam_Perawatan }}',
                                @endforeach
                            ],
							backgroundColor: [
								'rgb(234, 221, 202, 0.5)',
								'rgb(255, 191, 0, 0.5)',
                                'rgb(251, 206, 177, 0.5)',
                                'rgb(245, 245, 220, 0.5)',
                                'rgb(225, 193, 110, 0.5)',
                                'rgb(255, 234, 0, 0.5)',
                                'rgb(253, 218, 13, 0.5)',
                                'rgb(255, 255, 143, 0.5)',
                                'rgb(223, 255, 0, 0.5)',
                                'rgb(228, 208, 10, 0.5)',
                                'rgb(255, 248, 220, 0.5)',
                                'rgb(139, 128, 0, 0.5)',
                                'rgb(238, 220, 130, 0.5)',
                                'rgb(228, 155, 15, 0.5)',
                                'rgb(252, 245, 95, 0.5)',
                                'rgb(255, 255, 240, 0.5)',

							],
							borderColor: [
								'rgba(0, 0, 128, 1)',
								'rgba(152, 251, 152, 1)'
							],
							borderWidth: 1,
							
							datalabels:{
                                anchor: 'end',
								align: 'right'
							}
						}]
				},
				options: {
                    maintainAspectRatio: false,
                    indexAxis: 'y',
					scales: {
						yAxes: [{
								ticks: {
									beginAtZero: true
									
								}
							}]
						},
                        
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                    text: "Grafik Dalam Perawatan Per-Kecamatan"
                            }
                        },
					},
					plugins:[ChartDataLabels],
			});
		// end chart dalam perawatan

        // chart Isolasi Mandiri
		
            var ctx = document.getElementById("chartIsolasiMandiri");
			
			var diagramCovid = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [
                        @foreach ($data as $d)
                            '{{ $d->Kecamatan }}',
                        @endforeach
                    ],
					datasets: [{
							data: [
                                @foreach ($data as $d)
                                    '{{ $d->Isolasi_Mandiri }}',
                                @endforeach
                            ],
							backgroundColor: [
								'rgba(0,128,0, 0.5)',
								'rgba(152,251,152, 0.5)',
                                'rgba(144,238,144,0.5)',
                                'rgba(50, 205, 50 , 0.5)',
                                'rgba(86, 130, 3 , 0.5)',
                                'rgba(141, 182, 0 , 0.5)',
                                'rgba(168, 228, 160, 0.5)',
                                'rgba(41, 171, 135 , 0.5)',
                                'rgba(124, 252, 0 , 0.5)',
                                'rgba(0, 158, 96 , 0.5)',
                                'rgba(11, 102, 35 , 0.5)',
                                'rgba(197,227,132 , 0.5)',
                                'rgba(11,218,81 , 0.5)',

							],
							borderColor: [
								'rgba(0, 0, 128, 1)',
								'rgba(152, 251, 152, 1)'
							],
							borderWidth: 1,
							
							datalabels:{
                                anchor: 'end',
								align: 'right'
							}
						}]
				},
				options: {
                    maintainAspectRatio: false,
                    indexAxis: 'y',
					scales: {
						yAxes: [{
								ticks: {
									beginAtZero: true
									
								}
							}]
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                    text: "Grafik Isolasi Mandiri Per-Kecamatan"
                            }
					},
					
				},
				plugins:[ChartDataLabels],
			});
		// end chart Isolasi Mandiri

        // chart Dalam Sembuh
		
            var ctx = document.getElementById("Sembuh");
			
			var diagramcovid = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [
                        @foreach ($data as $d)
                            '{{ $d->Kecamatan }}',
                        @endforeach
                    ],
					datasets: [{
							data: [
                                @foreach ($data as $d)
                                    '{{ $d->Sembuh }}',
                                @endforeach
                            ],
							backgroundColor: [
								'rgba(135,206,250, 0.5)',
								'rgba(135,206,235, 0.5)',
                                'rgba(0,191,255, 0.5)',
                                'rgba(176,196,222, 0.5)',
                                'rgba(30,144,255, 0.5)',
                                'rgba(100,149,237, 0.5)',
                                'rgba(70,130,180, 0.5)',
                                'rgba(65,105,225, 0.5)',
                                'rgba(0,0,255, 0.5)',
                                'rgba(25,25,112, 0.5)',
                                'rgba(0,0,205, 0.5)',
                                'rgba(0,0,139, 0.5)',
                                'rgba(0,0,128, 0.5)',

							],
							borderColor: [
								'rgba(0, 0, 128, 1)',
								'rgba(152, 251, 152, 1)'
							],
							borderWidth: 1,
							
							datalabels:{
                                anchor: 'end',
								align: 'right'
							}
						}]
				},
				options: {
                    maintainAspectRatio: false,
                    indexAxis: 'y',
					scales: {
						yAxes: [{
								ticks: {
									beginAtZero: true
									
								}
							}]
						},
                        
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                    text: "Grafik Sembuh Per-Kecamatan"
                            }
                        },
					},
					plugins:[ChartDataLabels],
			});
		// end chart dalam Sembuh

        // chart Dalam Meninggal
		
            var ctx = document.getElementById("Meninggal");
			
			var diagramCovid = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: [
                        @foreach ($data as $d)
                            '{{ $d->Kecamatan }}',
                        @endforeach
                    ],
					datasets: [{
							data: [
                                @foreach ($data as $d)
                                    '{{ $d->Meninggal }}',
                                @endforeach
                            ],
							backgroundColor: [
								'rgba(255,0,0, 0.5)',
								'rgba(255,36,0, 0.5)',
                                'rgba(210,43,43, 0.5)',
                                'rgba(210,4,45, 0.5)',
                                'rgba(220,20,60, 0.5)',
                                'rgba(227,11,92, 0.5)',
                                'rgba(222,49,99, 0.5)',
                                'rgba(238,75,43, 0.5)',
                                'rgba(255,83,73, 0.5)',
                                'rgba(255,99,71, 0.5)',
                                'rgba(255,3,62, 0.5)',
                                'rgba(224,17,95, 0.5)',
                                'rgba(255,0,56, 0.5)',
                                'rgba(255,127,127, 0.5)',
                                'rgba(255,0,79, 0.5)',
                                'rgba(251,206,177, 0.5)',
                                'rgba(255,160,122, 0.5)',

							],
							borderColor: [
								'rgba(0, 0, 128, 1)',
								'rgba(152, 251, 152, 1)'
							],
							borderWidth: 1,
							
							datalabels:{
                                anchor: 'end',
								align: 'right'
							}
						}]
				},
				options: {
                    maintainAspectRatio: false,
                    indexAxis: 'y',
					scales: {
						yAxes: [{
								ticks: {
									beginAtZero: true
									
								}
							}]
                        },
                        plugins: {
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                    text: "Grafik Meninggal Karna covid Per-Kecamatan"
                            }
					},
					
				},
				plugins:[ChartDataLabels],
			});
		// end chart dalam Meninggal
    </script>    
@endsection