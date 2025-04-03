<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Utama</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Bootstrap Icons CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <style>
        /* Hilangkan latar belakang scrollbar */
        ::-webkit-scrollbar {
            width: 4px; /* Atur lebar scrollbar */
        }

        ::-webkit-scrollbar-track {
            background: transparent; /* Membuat track scrollbar transparan */
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(20, 20, 20, 0.8); /* Warna gelap transparan */
        }

        /* Hover effect */
        ::-webkit-scrollbar-thumb:hover {
            background: rgba(20, 20, 20, 0.8); /* Warna gelap transparan */
        }

        .note-title{
            width: 100%; /* Melebar penuh */
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc; /* Border default */
            border-radius: 5px;
            resize: none;
            outline: none; /* Hapus efek biru saat klik */
            caret-color: rgb(181, 181, 181);

        }
        .notepad {
            width: 100%; /* Melebar penuh */
            height: 300px;
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc; /* Border default */
            border-radius: 5px;
            resize: none;
            outline: none; /* Hapus efek biru saat klik */
            caret-color:rgb(181, 181, 181);
        }

        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">HALAMAN ADMIN</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-in-left"></i> Keluar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="halamanadmin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Halaman Utama
                            </a>
                            <a class="nav-link" href="dataPaud.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Paud
                            </a>
                            <a class="nav-link" href="dataCB.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Caberawit
                            </a>
                            <a class="nav-link" href="dataPraRemaja.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Pra Remaja
                            </a>
                            <a class="nav-link" href="dataRemaja.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Remaja
                            </a>
                            <a class="nav-link" href="dataPraNikah.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Pra Nikah
                            </a>
                            <a class="nav-link" href="dataUmum.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database"></i></div>
                                Data Umum
                            </a>
                            <a class="nav-link" href="dataPengurus.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-database-check"></i></div>
                                Data Pengurus
                            </a>
                            <a class="nav-link" href="kategoriAkun.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-box-arrow-in-right"></i></div>
                                Data Login
                            </a>
                            <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="bi bi-card-text"></i></div>
                                Catatan
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <div class="container-fluid px-4">
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h1 class="me-2">Catatan</h1>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check2-square fs-5 text-dark me-2" role="button" id="toggleSelectMode"></i>
                            <i class="bi bi-plus fs-3 text-dark me-2" role="button" onclick="addNote()"></i>
                            <button id="deleteSelectedBtn" class="btn btn-dark d-none me-2" onclick="deleteSelectedNotes()"><i class='fas fa-trash'></i></button>
                            <input type="text" id="searchBox" class="form-control" placeholder="Cari data...">
                        </div>
                    </div>
                    <hr>
                    <!-- Container untuk daftar catatan -->
                        <div id="notes-container">
                            <!-- Catatan pertama akan otomatis ada di awal -->
                            <div class="notepad-container note-item d-flex align-items-start" data-index="0">
                                <input type="checkbox" class="note-checkbox me-2 d-none" data-index="0" onclick="toggleSelection(0)">
                                <div class="w-100">
                                    <input type="text" class="note-title mb-2 form-control" placeholder="Masukkan judul catatan..." value="Catatan Pertama" />
                                    <textarea class="notepad form-control mb-3" placeholder="Tulis catatan di sini...">Ini adalah catatan default.</textarea>

                                    <button class="btn btn-primary mb-3" onclick="saveNote(this)"><i class="bi bi-save"></i> Simpan</button>
                                    <button class="btn btn-warning mb-3" onclick="clearNote(${index})"><i class="bi bi-x-circle"></i> Kosongkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script>
            let notes = JSON.parse(localStorage.getItem("notes")) || [];
            let selectMode = false; // Mode seleksi catatan
            let selectedNotes = new Set(); // Menyimpan indeks catatan yang dipilih

            // Pastikan catatan pertama selalu ada
            if (notes.length === 0) {
                notes.push({ title: "Catatan Pertama", content: "Ini adalah catatan default." });
                localStorage.setItem("notes", JSON.stringify(notes));
            }

            // 🔹 Fungsi untuk memuat catatan ke tampilan
            function loadNotes() {
                let notesContainer = document.getElementById("notes-container");
                notesContainer.innerHTML = "";

                notes.forEach((note, index) => {
                    let newNote = document.createElement("div");
                    newNote.classList.add("notepad-container", "note-item", "d-flex", "align-items-start");
                    newNote.dataset.index = index;
                    newNote.innerHTML = `
                        <input type="checkbox" class="note-checkbox me-2 d-none" data-index="${index}" onclick="toggleSelection(${index})">
                        <div class="w-100">
                            <input type="text" class="note-title mb-2 form-control" placeholder="Masukkan judul catatan..." value="${note.title}" oninput="updateNote(${index})" />
                            <textarea class="notepad form-control mb-3" placeholder="Tulis catatan di sini..." oninput="updateNote(${index})">${note.content}</textarea>
                            <button class="btn btn-primary mb-3" onclick="saveNote(${index})"><i class="bi bi-save"></i> Simpan</button>
                            <button class="btn btn-warning mb-3" onclick="clearNote(${index})"><i class="bi bi-x-circle"></i> Kosongkan</button>
                        </div>
                    `;
                    notesContainer.appendChild(newNote);
                });
            }

            // 🔹 Fungsi menambahkan catatan baru
            function addNote() {
                notes.push({ title: "", content: "" });
                localStorage.setItem("notes", JSON.stringify(notes));
                loadNotes();
            }

            // 🔹 Auto-Save saat pengguna mengetik di input atau textarea
            function updateNote(index) {
                let noteItems = document.querySelectorAll(".note-item");
                let noteDiv = noteItems[index];

                if (noteDiv) {
                    let title = noteDiv.querySelector(".note-title").value;
                    let content = noteDiv.querySelector(".notepad").value;
                    notes[index] = { title, content };
                    localStorage.setItem("notes", JSON.stringify(notes));
                }
            }

            // 🔹 Fungsi menyimpan catatan (opsional karena sekarang auto-save)
            function saveNote(index) {
                alert("Catatan berhasil disimpan!");
            }

            function clearNote(index) {
                if (!confirm("Yakin ingin mengosongkan isi catatan ini?")) return;

                let noteItems = document.querySelectorAll(".note-item");
                let noteDiv = noteItems[index];

                if (noteDiv) {
                    let textarea = noteDiv.querySelector(".notepad");
                    textarea.value = ""; // Kosongkan isi textarea
                    notes[index].content = ""; // Perbarui data dalam array
                    localStorage.setItem("notes", JSON.stringify(notes)); // Simpan perubahan
                }
            }

            // 🔹 Fungsi mengaktifkan mode seleksi
            document.getElementById("toggleSelectMode").addEventListener("click", function () {
                selectMode = !selectMode;
                document.querySelectorAll(".note-checkbox").forEach(checkbox => {
                    checkbox.classList.toggle("d-none", !selectMode);
                    checkbox.checked = false; // Reset checkbox saat mode seleksi aktif/nonaktif
                });

                selectedNotes.clear(); // Hapus pilihan sebelumnya
                document.getElementById("deleteSelectedBtn").classList.add("d-none"); // Sembunyikan tombol hapus
            });

            // 🔹 Fungsi memilih/deselect catatan
            function toggleSelection(index) {
                if (index == 0) return; // Cegah pemilihan catatan pertama

                if (selectedNotes.has(index)) {
                    selectedNotes.delete(index);
                } else {
                    selectedNotes.add(index);
                }

                // Tampilkan/hilangkan tombol hapus berdasarkan jumlah catatan yang dipilih
                document.getElementById("deleteSelectedBtn").classList.toggle("d-none", selectedNotes.size === 0);
            }

            // 🔹 Fungsi menghapus catatan yang dipilih dalam mode seleksi
            function deleteSelectedNotes() {
                if (selectedNotes.size === 0) return;

                if (confirm("Yakin ingin menghapus catatan yang dipilih?")) {
                    notes = notes.filter((_, index) => index === 0 || !selectedNotes.has(index)); // Pastikan catatan pertama tetap ada
                    localStorage.setItem("notes", JSON.stringify(notes));
                    loadNotes();
                }

                selectedNotes.clear();
                document.getElementById("deleteSelectedBtn").classList.add("d-none"); // Sembunyikan tombol hapus
            }

            window.onload = loadNotes;
    </script>
    <script>
        document.getElementById("searchBox").addEventListener("input", function () {
            var searchValue = this.value.toLowerCase(); // Ambil teks pencarian (huruf kecil semua)
            
            let notesContainer = document.getElementById("notes-container");
            let notes = Array.from(notesContainer.getElementsByClassName("note-item")); // Ambil semua catatan

            // Urutkan catatan berdasarkan kecocokan dengan teks pencarian
            notes.sort((a, b) => {
                let titleA = a.querySelector(".note-title").value.toLowerCase();
                let titleB = b.querySelector(".note-title").value.toLowerCase();
                
                // Jika cocok dengan pencarian, geser ke atas
                let matchA = titleA.includes(searchValue) ? -1 : 1;
                let matchB = titleB.includes(searchValue) ? -1 : 1;
                
                return matchA - matchB;
            });

            // Hapus dan tambahkan ulang dalam urutan yang benar
            notes.forEach(note => notesContainer.appendChild(note));
        });
    </script>
    </body>
</html>
