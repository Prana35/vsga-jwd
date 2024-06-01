<?php
    $daftarJenisKelamin = array("Laki-Laki", "Perempuan");
    $daftarGolongan = ["I","II","III","IV"];

    // mengambil data file json
    $fileDataKaryawan = "data/data_karyawan.json";
    $isiDataKaryawan = file_get_contents($fileDataKaryawan, true);

    $daftarKaryawan = array();
    $daftarKaryawan = json_decode($isiDataKaryawan, true);

    if(isset($_POST['btnSimpan'])) { // jika btnSimpan di klik

        // get data dari post
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $jenisKelamin = $_POST['jeniskelamin'];
        $golongan = $_POST['golongan'];

        $dataKaryawan = array(
            "nik" => $nik,
            "nama" => $nama,
            "jeniskelamin" => $jenisKelamin,
            "golongan" => $golongan
        );

        // memasukkan array data karyawan yang baru, ke daftar karyawan sebelumnya
        array_push($daftarKaryawan, $dataKaryawan);
        // mengubah array data karyawan ke json format
        $dataYangInginDitulisKeFile = json_encode($daftarKaryawan, JSON_PRETTY_PRINT);

        // tulis ke file data ke json
        file_put_contents($fileDataKaryawan, $dataYangInginDitulisKeFile);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Guys</title>

    <!-- Memanggil CSS Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.css"> 

    <!-- Tambahkan CSS untuk tema -->
    <style>
        body.light-mode {
            background-color: white;
            color: black;
        }
        body.dark-mode {
            background-color: #121212;
            color: white;
        }
        .btn-toggle {
            position: fixed;
            top: 10px;
            right: 10px;
        }
    </style>
</head>
<body class="light-mode">
    <!-- Button Toggle Theme -->
    <button class="btn btn-secondary btn-toggle" onclick="toggleTheme()">Ganti Tema</button>

    <!-- Navbar -->
    <!-- / Navbar -->

    <!-- Content -->
    <div class="container pt-4">
        <h1> Aplikasi Data Karyawan</h1>
        <hr>
        <form action="#" method="post">
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" name="nik" id="nik" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan</label>
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
                <label for="golongan" class="form-label">Golongan</label>
                <select class="form-select" name="golongan" id="golongan" required>
                    <?php
                    foreach ($daftarGolongan as $gol) {
                        echo "<option value='$gol'>$gol</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" name="btnSimpan" id="btnSimpan">
                    Simpan
                </button>
            </div>
        </form>
        <hr>
        <table class="table">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama Karyawan</th>
                    <th>Jenis Kelamin</th>
                    <th>Golongan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($daftarKaryawan as $karyawan) {
                    echo "<tr>";
                    echo "<td>" . $karyawan['nik'] . "</td>";
                    echo "<td>" . $karyawan['nama'] . "</td>";
                    echo "<td>" . $karyawan['jeniskelamin'] . "</td>";
                    echo "<td>" . $karyawan['golongan'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>

    <!-- / Content -->

    <!-- Memanggil JS Bootstrap-->
    <script src="js/bootstrap.js"></script>
    
    <!-- Tambahkan JS untuk toggle tema -->
    <script>
        function toggleTheme() {
            const body = document.body;
            if (body.classList.contains('light-mode')) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
            }
        }
    </script>
</body>
</html>
