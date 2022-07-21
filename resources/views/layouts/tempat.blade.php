<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- boostrap cdn -->
        <link rel="stylesheet" href="../../aset/Boostrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="../../aset/Boostrap/js/bootstrap.bundle.min.js"></script>
    <!-- end boostrap cdn -->

    <!-- w3school css cdn -->
        <link rel="stylesheet" href="../../aset/W3School/w3.css">
    <!-- end w3school css cdn -->

    <!-- leaflet -->
        <link rel="stylesheet" href="../../aset/leaflet/leaflet.css">
        <script src="../../aset/leaflet/leaflet.js"></script>
        
        <!-- export image -->
            <script src="../../aset/leaflet_Plugin/leaflet-easyprint/dist/bundle.js"></script>
        <!-- end export image -->

        <!-- btn plugins -->
            <link rel="stylesheet" href="../../aset/leaflet_Plugin/leaflet-easybutton/src/easy-button.css">
            <script src="../../aset/leaflet_Plugin/leaflet-easybutton/src/easy-button.js"></script>
        <!-- btn end plugins -->

        <!-- sidebarv2 plugins -->
            <link rel="stylesheet" href="../../aset/leaflet_Plugin/leaflet-sidebar-v2/css/leaflet-sidebar.css">
            <script src="../../aset/leaflet_Plugin/leaflet-sidebar-v2/js/leaflet-sidebar.js"></script>
        <!-- end sidebarv2 plugins -->

        <!-- legend -->
            <link rel="stylesheet" href="../../aset/leaflet_Plugin/leaflet-legend/leafletLegend.css">
            <script src="../../aset/leaflet_Plugin/leaflet-legend/leafletLegend.js"></script>
        <!-- end legend -->
    <!-- end leaflet -->

    <!-- map -->
        <script src="../../aset/geoJson/BANYUSARI.js"></script>
        <script src="../../aset/geoJson/BATUJAYA.js"></script>
        <script src="../../aset/geoJson/CIAMPEL.js"></script>
        <script src="../../aset/geoJson/CIBUAYA.js"></script>
        <script src="../../aset/geoJson/CIKAMPEK.js"></script>
        <script src="../../aset/geoJson/CILAMAYAWETAN.js"></script>
        <script src="../../aset/geoJson/CILAMAYAKULON.js"></script>
        <script src="../../aset/geoJson/CILEBAR.js"></script>
        <script src="../../aset/geoJson/JATISARI.js"></script>
        <script src="../../aset/geoJson/JAYAKERTA.js"></script>
        <script src="../../aset/geoJson/KARAWANGBARAT.js"></script>
        <script src="../../aset/geoJson/KARAWANGTIMUR.js"></script>
        <script src="../../aset/geoJson/KLARI.js"></script>
        <script src="../../aset/geoJson/KOTABARU.js"></script>
        <script src="../../aset/geoJson/KUTAWALUYA.js"></script>
        <script src="../../aset/geoJson/LEMAHABANG.js"></script>
        <script src="../../aset/geoJson/MAJALAYA.js"></script>
        <script src="../../aset/geoJson/PAKISJAYA.js"></script>
        <script src="../../aset/geoJson/PANGKALAN.js"></script>
        <script src="../../aset/geoJson/PEDES.js"></script>
        <script src="../../aset/geoJson/PURWASARI.js"></script>
        <script src="../../aset/geoJson/RAWAMERTA.js"></script>
        <script src="../../aset/geoJson/RENGASDENGKLOK.js"></script>
        <script src="../../aset/geoJson/TELAGASARI.js"></script>
        <script src="../../aset/geoJson/TEGALWARU.js"></script>
        <script src="../../aset/geoJson/TELUKJAMBEBARAT.js"></script>
        <script src="../../aset/geoJson/TELUKJAMBETIMUR.js"></script>
        <script src="../../aset/geoJson/TEMPURAN.js"></script>
        <script src="../../aset/geoJson/TIRTAJAYA.js"></script>
        <script src="../../aset/geoJson/TIRTAMULYA.js"></script>
    <!-- end map -->

    <!-- chart js -->
        <script src="../../aset/chart.js/dist/chart.min.js"></script>
        <script src="../../aset/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.min.js"></script>
    <!-- end chart js -->

    <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end font awesome -->

    <script src="../../aset/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../../aset/css/dashboardAdmin.css">
    <link rel="stylesheet" href="../../aset/CSS/Style.css?<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../../aset/CSS/labelmap.css?<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../../aset/CSS/persebaranCOVID.css?<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../../aset/CSS/persebaranCOVID.css?<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../../aset/CSS/halamanUtama.css?<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../../aset/CSS/tentang.css?<?php echo time(); ?>" type="text/css">
    <link rel="stylesheet" href="../aset/CSS/halamanCovid.css">
    
    
    <title>{{ $title }}</title> 
</head>
    <body>
        <div class="page">
            <div class="sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-logo-countainer">
                        <div class="logo-container">
                            <img class="logo-sidebar" src="../../aset/IMG/STMIK Seal.png" alt="">
                        </div>
                    </div>
                </div>

        @include('layouts.sidebar')
        
        @yield('content')
        @include('sweetalert::alert')
        <!-- boostrap js cdn -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- boostrap js cdn -->
        <script src="../../aset/jquery/dist/jquery.min.js"></script>
        <script src="../../aset/JS/count.js"></script>
        <script src="../../aset/JS/shareKeSosmed.js"></script>
        <script src="../../aset/JS/search.js"></script>
        <script src="../../aset/JS/ToggleButton.js"></script>
    </body>
</html>
