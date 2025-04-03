/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

$(document).ready(function () {
    let editCooldown = 20 * 60 * 1000; // 20 menit dalam milidetik
    let clickCooldown = 5000; // Mencegah spam edit dalam 5 detik
    let lastEditClick = {}; // Menyimpan waktu terakhir tombol "Edit" ditekan

    function isEditAllowed(id) {
        let lastEditTime = localStorage.getItem("edit_" + id);
        if (!lastEditTime) return true; // Jika belum pernah diedit, izinkan edit

        let elapsedTime = Date.now() - parseInt(lastEditTime);
        return elapsedTime > editCooldown; // Izinkan edit setelah 20 menit
    }

    $("#example").on("click", ".edit-btn", function () {
        let id = $(this).data("id");
        let now = Date.now();

        // Cegah spam klik edit dalam 5 detik
        if (lastEditClick[id] && now - lastEditClick[id] < clickCooldown) {
            Swal.fire("Terlalu Banyak Aksi!", "Silakan tunggu beberapa detik sebelum mencoba lagi.", "warning");
            return;
        }

        lastEditClick[id] = now; // Update waktu terakhir tombol ditekan

        if (!isEditAllowed(id)) {
            Swal.fire("Edit Dibatasi!", "Anda hanya bisa mengedit sekali dalam 20 menit.", "error");
            return;
        }

        // Simpan waktu edit ke localStorage
        localStorage.setItem("edit_" + id, now);

        // Arahkan ke halaman edit
        window.location.href = "editDataPraRemaja.php?id=" + id;
    });
});