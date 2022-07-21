        <script>
            var map = L.map('map').setView([-6.28808190094599, 107.27282067532589], 10);

            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/light-v9',
                tileSize: 512,
                zoomOffset: -1,
            }).addTo(map);

            @foreach ($data as $d)                    
                L.geoJSON({{ str_replace(' ', '',$d->Kecamatan) }},
                {weight: 2,opacity: 1,color: 'white',fillOpacity: 0.7,fillColor: '{{ ($d->zona === "C1" ? "#4cd964" : ($d->zona === "C2" ? "#ffcc00" : ($d->zona === "C3" ? "#ff9500" : "#ff3b30")))}}'})
                .addTo(map).bindPopup("Kecamatan : <b>{{ $d->Kecamatan }}</b> <br> Dalam Perawatan : <b>{{ $d->Dalam_Perawatan }}</b> <br> Isolasi Mandiri : <b>{{ $d->Isolasi_Mandiri }}</b> <br> Sembuh : <b>{{ $d->Sembuh }}</b> <br> Meninggal : <b>{{ $d->Meninggal }}</b>")
                .bindTooltip("{{ $d->Kecamatan }}",{permanent:true,direction:'center',className:
                    // margin
                        '{{ ($d->Kecamatan == "RENGASDENGKLOK" ? "label_in_map2" : ($d->Kecamatan == "TELUKJAMBE BARAT" ? "label_in_map2" : ($d->Kecamatan == "MAJALAYA" ? "label_in_map2" : "label_in_map"))) }}'
                    // end margin  
                });
            @endforeach                                         
                             
            // button home in map
                L.easyButton("bi bi-house-door-fill", function(btn, map){
                    map.setView([-6.28808190094599, 107.27282067532589], 10);
                }).addTo(map);
            // end button home in map

            // sidebar map
                var sidebar = L.control.sidebar({
                    autopan: false,       // whether to maintain the centered map point when opening the sidebar
                    closeButton: true,    // whether t add a close button to the panes
                    container: 'sidebar', // the DOM container or #ID of a predefined sidebar container that should be used
                    position: 'left',     // left or right
                }).addTo(map);
            // end sidebar map

            // legend
                L.control.Legend({
                    position: "bottomright",
                    opacity: 0,
                    symbolWidth: 24,
                    collapsed: false,
                    title:'ZONA',
                    legends: [{
                        bold: true,
                        label: ": ZONA AMAN",
                        type: "rectangle",
                        color: "#4cd964",
                        fillColor: "#4cd964",
                        weight: 2
                    },{
                        label: ": ZONA RESIKO RENDAH ",
                        type: "rectangle",
                        color: "#ffcc00",
                        fillColor: "#ffcc00",
                        weight: 2
                    },{
                        label: ": ZONA RESIKO SEDANG",
                        type: "rectangle",
                        color: "#ff9500",
                        fillColor: "#ff9500",
                        weight: 2
                    },{
                        label: ": ZONA BERBAHAYA",
                        type: "rectangle",
                        color: "#ff3b30",
                        fillColor: "#ff3b30",
                        weight: 2
                    },
                ]
                }).addTo(map);
            // end legend

            // export
                L.easyPrint({
                    tileLayer: tiles,
                    sizeModes: ['Current'],
                    filename: 'Map Perebaran COVID-19',
                    exportOnly: true,
                    hideControlContainer: true,
                }).addTo(map);
            // end export
        </script>
        <style>
            .easyPrintHolder .a3CssClass { 
                background-image: url(data:image/svg+xml;utf8;base64,PD9...go=);
                }
        </style>
    <!-- end leaflet map -->

<!-- persentasi zonasi -->
    <div class="mt-sm-3 w3-center">
        <span style="background-color:#4cd964; color:#4cd964;">BAYUUUU</span> 
        <b>: 
            {{ $zona1 }}%
        </b>
        <span style="background-color:#ffcc00; color:#ffcc00;" class="ms-sm-3">BAYUUUU</span>
        <b>: 
            {{ $zona2 }}%
        </b>
        <span style="background-color:#ff9500; color:#ff9500;" class="ms-sm-3">BAYUUUU</span>
        <b>: 
            {{ $zona3 }}%
        </b>
        <span style="background-color:#ff3b30; color:#ff3b30;" class="ms-sm-3">BAYUUUU</span>
        <b>: 
            {{ $zona4 }}%
        </b>
    </div>
<!-- end prsentase zonasi -->