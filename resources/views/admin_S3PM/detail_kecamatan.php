<?php
    session_start();
    if(isset($_SESSION['status']) != "login"){
        header('Location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- boostrap cdn -->
        <link rel="stylesheet" href="../aset/Boostrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="../aset/Boostrap/js/bootstrap.bundle.min.js"></script>
    <!-- end boostrap cdn -->

    <!-- leaflet -->
        <link rel="stylesheet" href="../aset/leaflet/leaflet.css">
        <script src="../aset/leaflet/leaflet.js"></script>
        
        <!-- btn plugins -->
            <link rel="stylesheet" href="../aset/leaflet_Plugin/leaflet-easybutton/src/easy-button.css">
            <script src="../aset/leaflet_Plugin/leaflet-easybutton/src/easy-button.js"></script>
        <!-- btn end plugins -->

        <!-- legend -->
            <link rel="stylesheet" href="../aset/leaflet_Plugin/leaflet-legend/leafletLegend.css">
            <script src="../aset/leaflet_Plugin/leaflet-legend/leafletLegend.js"></script>
        <!-- end legend -->
    <!-- end leaflet -->

    <!-- map -->
        <script src="../aset/geoJson/BANYUSARI.js"></script>
        <script src="../aset/geoJson/BATUJAYA.js"></script>
        <script src="../aset/geoJson/CIAMPEL.js"></script>
        <script src="../aset/geoJson/CIBUAYA.js"></script>
        <script src="../aset/geoJson/CIKAMPEK.js"></script>
        <script src="../aset/geoJson/CILAMAYAWETAN.js"></script>
        <script src="../aset/geoJson/CILAMAYAKULON.js"></script>
        <script src="../aset/geoJson/CILEBAR.js"></script>
        <script src="../aset/geoJson/JATISARI.js"></script>
        <script src="../aset/geoJson/JAYAKERTA.js"></script>
        <script src="../aset/geoJson/KARAWANGBARAT.js"></script>
        <script src="../aset/geoJson/KARAWANGTIMUR.js"></script>
        <script src="../aset/geoJson/KLARI.js"></script>
        <script src="../aset/geoJson/KOTABARU.js"></script>
        <script src="../aset/geoJson/KUTAWALUYA.js"></script>
        <script src="../aset/geoJson/LEMAHABANG.js"></script>
        <script src="../aset/geoJson/MAJALAYA.js"></script>
        <script src="../aset/geoJson/PAKISJAYA.js"></script>
        <script src="../aset/geoJson/PANGKALAN.js"></script>
        <script src="../aset/geoJson/PEDES.js"></script>
        <script src="../aset/geoJson/PURWASARI.js"></script>
        <script src="../aset/geoJson/RAWAMERTA.js"></script>
        <script src="../aset/geoJson/RENGASDENGKLOK.js"></script>
        <script src="../aset/geoJson/TELAGASARI.js"></script>
        <script src="../aset/geoJson/TEGALWARU.js"></script>
        <script src="../aset/geoJson/TELUKJAMBEBARAT.js"></script>
        <script src="../aset/geoJson/TELUKJAMBETIMUR.js"></script>
        <script src="../aset/geoJson/TEMPURAN.js"></script>
        <script src="../aset/geoJson/TIRTAJAYA.js"></script>
        <script src="../aset/geoJson/TIRTAMULYA.js"></script>
    <!-- end map -->

    <!-- w3school css cdn -->
        <link rel="stylesheet" href="../aset/W3School/w3.css">
    <!-- end w3school css cdn -->

    <!-- font-awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- end font awesome -->
    
    <script src="../aset/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="../aset/CSS/Style.css?<?php echo time(); ?>" type="text/css">

    <title>update data Kecamatan</title> 
</head>

<body>
    <div class="page">
        <!-- sidebar -->
            <div class="sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-logo-countainer">
                        <div class="logo-container">
                            <img class="logo-sidebar" src="../aset/IMG/STMIK Seal.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="sidebar-body">
                    <ul class="navigation-list">
                        <li class="navigation-list-item">
                            <a class="navigation-link" href="dashboardAdmin.php">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="col-10">
                                        Dashboard
                                    </div>
                                </div>    
                            </a>
                        </li>

                        <li class="navigation-list-item">
                            <a class="navigation-link" href="inputDataCovid.php">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="../aset/IMG/iconCovid.svg" alt="" srcset="">
                                    </div>
                                    
                                    <div class="col-10">
                                        COVID-19
                                    </div>
                                </div>    
                            </a>
                        </li>

                        <li class="navigation-list-item active">
                            <a class="navigation-link" href="dataKecamatan.php">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-geo-alt-fill"></i>
                                    </div>
                                    
                                    <div class="col-10">
                                        Kecamatan
                                    </div>
                                </div>    
                            </a>
                        </li>

                        <li class="navigation-list-item">
                            <a class="navigation-link" href="clustering.php">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="../aset/IMG/cluster.png" alt="" srcset="">
                                    </div>
                                    
                                    <div class="col-10">
                                        Clustering
                                    </div>
                                </div>    
                            </a>
                        </li>

                        <li class="navigation-list-item">
                            <a class="navigation-link" href="../DataPersebaranCovid.php">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="../aset/IMG/iconCovid.svg" alt="" srcset="">
                                    </div>
                                    
                                    <div class="col-10">
                                        Persebaran COVID-19
                                    </div>
                                </div>    
                            </a>
                        </li>

                        <li class="navigation-list-item">
                            <a target="_blank" class="navigation-link" href="../aset/Panduan Penggunaan Aplikasi S3PM.pdf">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    
                                    <div class="col-10">
                                        Panduan
                                    </div>
                                </div>    
                            </a>
                        </li>

                        <li class="navigation-list-item">
                            <a class="navigation-link" href="../tentang.php">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa-solid fa-circle-question"></i>
                                    </div>
                                    
                                    <div class="col-10">
                                        Tentang
                                    </div>
                                </div>    
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        <!-- end sidebar -->

        <div class="content">
            <div class="navigationBar">
                <button id="sidebarToggle" class="btn sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <button class="btn_logout btn w3-right logout">
                    Logout
                </button>
            </div>

            <div class="isi">
                <a href="dataKecamatan.php" class="back"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                <div id="mapDetailKecamatan" style="width: 600px; height: 500px;" class="w-100 p-sm-3"></div>
                <?php
                    require_once '../Class/class_koneksi.php';
                    require_once '../Class/class_map.php';

                    $dataKecamatan = $con->prepare("SELECT * FROM tbl_datakecamatan WHERE idKecamatan = ".$_GET['idKecamatan']);
                    $dataKecamatan->execute();
                    while ($data = $dataKecamatan->fetch()){
                        $kecamatan = $data['NamaKecamatan'];
                    }
                    $map->detailPemetaan($_GET['idKecamatan'],$kecamatan);
                ?>
            </div>
        </div>
    </div>

    <script src="../aset/jquery/dist/jquery.min.js"></script>
    <script src="../aset/JS/ToggleButton.js"></script>
    <script src="../aset/JS/logout.js"></script>
</body>
</html>