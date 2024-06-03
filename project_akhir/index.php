<?php
$daftarJenisKelamin = array("Laki-Laki", "Perempuan");
$daftarAgama = array("Islam", "Kristen", "Katolik", "Hindu", "Budha", "Konghucu");
$daftarJurusan = array("Pilih Jurusan" => array(""), "Teknik Informatika" => array("Algoritma", "Pemrograman", "Basis Data", "Jaringan Komputer", "Sistem Operasi", "Struktur Data", "Kecerdasan Buatan", "Pemrograman Web", "Keamanan Komputer", "Pengembangan Perangkat Lunak"), "Sistem Informasi" => array("Pengantar SI", "Analisis Sistem", "Desain Sistem", "Manajemen Proyek", "Pemrograman", "Jaringan Komputer", "Keamanan Sistem", "Audit Sistem", "E-Business", "Data Mining"), "Teknik Komputer" => array("Logika Digital", "Sistem Digital", "Jaringan Komputer", "Pemrograman", "Elektronika", "Arsitektur Komputer", "Sistem Tertanam", "Robotika", "Kecerdasan Buatan", "Pemrograman Web"), "Ilmu Komputer" => array("Pengantar Ilmu Komputer", "Pemrograman", "Struktur Data", "Algoritma", "Basis Data", "Jaringan Komputer", "Sistem Operasi", "Kecerdasan Buatan", "Pemrograman Web", "Keamanan Komputer"), "Manajemen Informatika" => array("Pengantar MI", "Analisis Sistem", "Desain Sistem", "Manajemen Proyek", "Pemrograman", "Jaringan Komputer", "Keamanan Sistem", "Audit Sistem", "E-Business", "Data Mining"));

// mengambil data file json
$fileDataMahasiswa = "data/data_mahasiswa.json";
if (file_exists($fileDataMahasiswa)) {
    $isiDataMahasiswa = file_get_contents($fileDataMahasiswa);
    $daftarMahasiswa = json_decode($isiDataMahasiswa, true);
    if ($daftarMahasiswa === null) {
        $daftarMahasiswa = array();
    }
} else {
    $daftarMahasiswa = array();
}

if (isset($_POST['btnSimpan'])) { // jika btnSimpan di klik
    // get data dari post
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jenisKelamin = $_POST['jeniskelamin'];
    $tempatLahir = $_POST['tempatlahir'];
    $tanggalLahir = $_POST['tanggallahir'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $noTelp = $_POST['notelp'];
    $email = $_POST['email'];
    $jurusan = $_POST['jurusan'];
    $mataKuliah = $_POST['matakuliah'];
    $nilai = $_POST['nilai'];

    $dataMahasiswa = array(
        "nim" => $nim,
        "nama" => $nama,
        "jeniskelamin" => $jenisKelamin,
        "tempatlahir" => $tempatLahir,
        "tanggallahir" => $tanggalLahir,
        "agama" => $agama,
        "alamat" => $alamat,
        "notelp" => $noTelp,
        "email" => $email,
        "jurusan" => $jurusan,
        "matakuliah" => $mataKuliah,
        "nilai" => $nilai,
        "nilaiHuruf" => getNilaiHuruf($nilai),
        "keterangan" => getKeterangan($nilai)
    );

    // memasukkan array data mahasiswa yang baru, ke daftar mahasiswa sebelumnya
    array_push($daftarMahasiswa, $dataMahasiswa);
    
    // mengubah array data mahasiswa ke json format
    $dataYangInginDitulisKeFile = json_encode($daftarMahasiswa, JSON_PRETTY_PRINT);

    // tulis ke file data ke json
    file_put_contents($fileDataMahasiswa, $dataYangInginDitulisKeFile);

    // Redirect ke halaman yang sama setelah data disimpan
    header("Location: ".$_SERVER['PHP_SELF']);
    exit(); // Penting untuk menghentikan eksekusi script setelah redirect
}

function getNilaiHuruf($nilai) {
    if ($nilai >= 91) return 'A';
    if ($nilai >= 81) return 'B';
    if ($nilai >= 71) return 'C';
    if ($nilai >= 61) return 'D';
    return 'E';
}

function getKeterangan($nilai) {
    return $nilai >= 61 ? 'Lulus' : 'Tidak Lulus';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <!-- Memanggil CSS Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> 
    <style>
        /* Custom CSS untuk layout dua kolom */
        .form-column {
            column-count: 2;
            column-gap: 2rem;
        }

        /* Style untuk input agar memenuhi dua kolom */
        .form-column .form-control {
            width: 100%;
        }
        .nilai-container {
            display: flex;
            justify-content: space-between;
            padding: 2px 0;
        }
        .nilai-container div {
            width: 45%;
        }
        .nilai-container h4 {
            width: 45%;
            font-size: 1.2rem;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container pt-4">
        <h1>Form Data Mahasiswa</h1>
        <hr>
        <form action="#" method="post" class="form-column">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" name="nim" id="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-select" name="jeniskelamin" id="jeniskelamin" required>
                    <?php
                    foreach($daftarJenisKelamin as $jenisKelamin) {
                        echo "<option value='$jenisKelamin'>$jenisKelamin</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tempatlahir" class="form-label">Tempat Lahir</label>
                <input type="text" name="tempatlahir" id="tempatlahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="tanggallahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggallahir" id="tanggallahir" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="agama" class="form-label">Agama</label>
                <select class="form-select" name="agama" id="agama" required>
                    <?php
                    foreach($daftarAgama as $agama) {
                        echo "<option value='$agama'>$agama</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="btnSimpan" id="btnSimpan">
                    Simpan
                </button>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="notelp" class="form-label">No Telp</label>
                <input type="text" name="notelp" id="notelp" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" name="jurusan" id="jurusan" required>
                    <?php
                    foreach($daftarJurusan as $jurusan => $mataKuliah) {
                        echo "<option value='$jurusan'>$jurusan</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="matakuliah" class="form-label">Matakuliah</label>
                <select class="form-select" name="matakuliah" id="matakuliah" required>
                    <!-- Options will be populated using JavaScript -->
                </select>
            </div>
            <div class="mb-3">
                <label for="nilai" class="form-label">Nilai</label>
                <input type="number" name="nilai" id="nilai" class="form-control" required min="0" max="100">
            </div>
            
        </form>
        <hr>
        <h2>Data Mahasiswa</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Jurusan</th>
                    <th>Matakuliah</th>
                    <th>Nilai</th>
                    <th>Nilai Huruf</th>
                    <th>Keterangan</th>
                </tr>
                </thead>
                <tbody>

                    <?php
                    if (!empty($daftarMahasiswa)) {
                        foreach($daftarMahasiswa as $mahasiswa) {
                            echo "<tr>";
                            echo "<td>{$mahasiswa['nim']}</td>";
                            echo "<td>{$mahasiswa['nama']}</td>";
                            echo "<td>{$mahasiswa['jeniskelamin']}</td>";
                            echo "<td>{$mahasiswa['jurusan']}</td>";
                            echo "<td>{$mahasiswa['matakuliah']}</td>";
                            echo "<td>{$mahasiswa['nilai']}</td>";
                            echo "<td>{$mahasiswa['nilaiHuruf']}</td>";
                            echo "<td>{$mahasiswa['keterangan']}</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='14' class='text-center'>Belum ada data mahasiswa.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

            <br>
            <br>

            <!-- Keterangan nilai -->
            <div class="nilai-container">
                <h4>Nilai</h4>
                <h4>NH</h4>
            </div>
            <div class="nilai-container">
                <div>91 - 100</div>
                <div>A</div>
            </div>
            <div class="nilai-container">
                <div>81 - 90</div>
                <div>B</div>
            </div>
            <div class="nilai-container">
                <div>71 - 80</div>
                <div>C</div>
            </div>
            <div class="nilai-container">
                <div>61 - 70</div>
                <div>D</div>
            </div>
            <div class="nilai-container">
                <div>0 - 50</div>
                <div>E</div>
            </div>

            <div class="nilai-container">
                <h4>Nilai</h4>
            </div>
            <div class="nilai-container">
                    <div>Nilai 71 - 100</div>
                    <div>Lulus</div>
            </div>
            <div class="nilai-container">
                    <div>Nilai 0 - 70</div>
                    <div>Tidak Lulus</div>
            </div>
            
            <br>
            <br>     
    </div>
    
        <!-- Memanggil JS Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Script untuk mengubah mata kuliah berdasarkan jurusan yang dipilih -->
        <script>
            const daftarJurusan = <?php echo json_encode($daftarJurusan); ?>;
            
            document.getElementById('jurusan').addEventListener('change', function() {
                const jurusanSelected = this.value;
                const mataKuliahSelect = document.getElementById('matakuliah');
                mataKuliahSelect.innerHTML = '';
    
                if (daftarJurusan[jurusanSelected]) {
                    daftarJurusan[jurusanSelected].forEach(mataKuliah => {
                        const option = document.createElement('option');
                        option.value = mataKuliah;
                        option.textContent = mataKuliah;
                        mataKuliahSelect.appendChild(option);
                    });
                }
            });
        </script>
    </body>
    </html>
         

