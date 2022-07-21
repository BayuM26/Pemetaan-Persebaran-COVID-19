$(document).ready(function() {
    $('#searchAdmin').on('keyup', function() {
        $.ajax({
            type: 'POST',
            url: '../class/class_admin.php',
            data: {
                searchDataAdmin: $(this).val()
            },
            cache: false,
            success: function(data) {
                $('#tampilAdmin').html(data);
            }
        });
    });
});

$(document).ready(function() {
    $('#searchkecamatanDataCovid').on('keyup', function() {
        $.ajax({
            type: 'POST',
            url: '../class/class_dataCovid.php',
            data: {
                searchDataCovid: $(this).val()
            },
            cache: false,
            success: function(data) {
                $('#tampilDataCovid').html(data);
            }
        });
    });
});

$(document).ready(function() {
    $('#searchAdminhalUtama').on('keyup', function() {
        $.ajax({
            type: 'POST',
            url: 'class/class_dataCovid.php',
            data: {
                searchDataCovidHalamUtama: $(this).val()
            },
            cache: false,
            success: function(data) {
                $('#tampilDataCovidHalamanUtama').html(data);
            }
        });
    });
});

$(document).ready(function() {
    $('#searchKecamatan').on('keyup', function() {
        $.ajax({
            type: 'POST',
            url: '../class/class_dataKecamatan.php',
            data: {
                searchDataKecamatan: $(this).val()
            },
            cache: false,
            success: function(data) {
                $('#tampilKecamatan').html(data);
            }
        });
    });
});

