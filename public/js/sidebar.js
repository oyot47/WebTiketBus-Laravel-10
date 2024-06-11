$(document).ready(function() {
    // Ambil URL saat ini
    var currentUrl = window.location.href;

    // Periksa apakah URL saat ini mengandung kata 'dashboard'
    if (currentUrl.includes('admin')) {
        // Tambahkan kelas 'active' ke tombol 'Dashboard' pada sidebar
        $('#sidebar-dashboard').addClass('active');
    }

    // Periksa apakah URL saat ini mengandung kata 'users'
    if (currentUrl.includes('admin.view')) {
        // Tambahkan kelas 'active' ke tombol 'Users' pada sidebar
        $('#sidebar-users').addClass('active');
    }
});
