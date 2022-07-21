$(document).on('click','.btn_logout', function(){
    Swal.fire({
    title: 'Apakah anda ingin logout?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Logout'
    }).then((result) => {
        if (result.isConfirmed) {
            location.href='../Class/class_logout.php';
        }
    });
});

$(document).on('click', '.btn_logout_halUtama', function(){
    Swal.fire({
    title: 'Apakah anda ingin logout?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Logout'
    }).then((result) => {
        if (result.isConfirmed) {
            location.href='Class/class_logout.php';
        }
    });
});