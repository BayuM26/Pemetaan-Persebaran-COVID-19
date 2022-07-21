<!-- sidebar -->
    <div class="sidebar-body">
        <ul class="navigation-list">
            @auth
                @if (auth()->user()->hak_akses == 'admin_S3PM')
                    
                    <li class="navigation-list-item {{ ($title === 'Dashboard') ? 'active': ''}}">
                        <a class="navigation-link" href="/dashboard">
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

                    <li class="navigation-list-item {{ ($title === 'COVID-19') ? 'active': ''}}">
                        <a class="navigation-link" href="/KelolaDataCOVID">
                            <div class="row">
                                <div class="col-2">
                                    <img src="aset/IMG/iconCovid.svg" alt="" srcset="">
                                </div>
                                
                                <div class="col-10">
                                    COVID-19
                                </div>
                            </div>    
                        </a>
                    </li>
        
                    <li class="navigation-list-item {{ ($title === 'Kelola Kecamatan') ? 'active': ''}}">
                        <a class="navigation-link" href="/KelolaKecamatan">
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
                @else
                    <li class="navigation-list-item {{ ($title === 'Kelola Admin') ? 'active' : ''}}">
                        <a class="navigation-link" href="/admin">
                            <div class="row">
                                <div class="col-2">
                                    <img src="../aset/IMG/iconAdmin.svg" alt="" srcset="">
                                </div>
                                
                                <div class="col-10">
                                    Admin
                                </div>
                            </div>    
                        </a>
                    </li>
                @endif
    
                <li class="navigation-list-item {{ ($title === 'Clustering') ? 'active': ''}}">
                    <a class="navigation-link" href="admin_S3PM/clustering.php">
                        <div class="row">
                            <div class="col-2">
                                <img src="aset/IMG/cluster.png" alt="" srcset="">
                            </div>
                            
                            <div class="col-10">
                                Clustering
                            </div>
                        </div>    
                    </a>
                </li>
            @else
                <li class="navigation-list-item {{ ($title === 'Halaman Utama') ? 'active': ''}}">
                    <a class="navigation-link" href="/">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="col-10">
                                Halaman Utama
                            </div>
                        </div>    
                    </a>
                </li>
            @endauth

            <li class="navigation-list-item {{ ($title === 'Persebaran COVID-19') ? 'active': ''}}">
                <a class="navigation-link" href="Data_Persebaran">
                    <div class="row">
                        <div class="col-2">
                            <img src="aset/IMG/iconCovid.svg" alt="" srcset="">
                        </div>
                        
                        <div class="col-10">
                            Persebaran COVID-19
                        </div>
                    </div>    
                </a>
            </li>

            @auth    
                <li class="navigation-list-item">
                    <a target="_blank" class="navigation-link" href="aset/{{ (auth()->user()->hak_akses === 'admin' ? 'Panduan Penggunaan Aplikasi admin.pdf' : 'Panduan Penggunaan Aplikasi S3PM.pdf') }}">
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
            @endauth

            <li class="navigation-list-item {{ ($title === 'Tentang') ? 'active': ''}}">
                <a class="navigation-link" href="tentang">
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
<!-- end sidebar -->
</div>

<div class="content">
    <div class="navigationBar">
        <button id="sidebarToggle" class="btn sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        @auth
            <a href="logout" class=" btn w3-right logout">
                Logout
            </a>
        @else
            <a href="login" class="btn w3-right login">
                Login
            </a>
        @endauth
    </div>