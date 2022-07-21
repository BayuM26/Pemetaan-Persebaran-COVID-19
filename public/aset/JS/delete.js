// validasi delete data admin
    $(document).on('click', '.btn_deleteAdmin', function(){
        var idAdmin = $(this).attr('id');

        Swal.fire({
            title: 'PERINGATAN',
            text: 'APAKAH ANDA YAKIN INGIN MENGHAPUS DATA ADMIN INI?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'DELETE'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "../Class/class_admin.php",
                    data: {id_admin:idAdmin},
                    cache: false,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'DATA BERHASIL DI DIHAPUS',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result)=>{
                            location.reload();
                        });
                    }
                });
            }
        })
    });
// end validasi data admin

// validasi delete data admin
    $(document).on('click', '.btn_delete_data_Covid', function(){
        var idDataCovid = $(this).attr('id');

        Swal.fire({
            title: 'PERINGATAN',
            text: 'APAKAH ANDA YAKIN INGIN MENGHAPUS DATA COVID INI?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'DELETE'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "../Class/class_dataCovid.php",
                    data: {idDataCovid:idDataCovid},
                    cache: false,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'DATA BERHASIL DI DIHAPUS',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result)=>{
                            location.reload();
                        });
                    }
                });
            }
        })
    });
// end validasi data admin

// validasi delete data admin
    $(document).on('click', '.btn_deleteKecamatan', function(){
        var idDataKecamatan = $(this).attr('id');
        
        Swal.fire({
            title: 'PERINGATAN',
            text: 'APAKAH ANDA YAKIN INGIN MENGHAPUS DATA KECAMATAN INI?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'DELETE'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: "../Class/class_dataKecamatan.php",
                    data: {idDataKecamatan:idDataKecamatan},
                    cache: false,
                    success: function(data) {
                        Swal.fire({
                            icon: 'success',
                            title: 'DATA BERHASIL DI DIHAPUS',
                            showConfirmButton: false,
                            timer: 1500
                        }).then((result)=>{
                            location.reload();
                        });
                    }
                });
            }
        })
    });
// end validasi data admin