$(document).ready(function () {
    $("#dataCaberawit").on("click", ".delete-btn", function () {
        let id = $(this).data("id");
        let row = $(this).closest("tr");

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Data akan dihapus secara permanen!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "hapus_akun.php",
                    type: "POST",
                    data: { id: id },
                    success: function (response) {
                        if (response.trim() === "success") {
                            Swal.fire("Berhasil!", "Data telah dihapus.", "success").then(() => {
                                row.remove(); // Hapus baris dari tabel
                            });
                        } else {
                            Swal.fire("Gagal!", "Data tidak dapat dihapus.", "error");
                        }
                    },
                    error: function () {
                        Swal.fire("Error!", "Terjadi kesalahan saat menghapus data.", "error");
                    }
                });
            }
        });
    });
});
