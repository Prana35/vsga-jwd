<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Prana Alfath Rais</title>

<style>
    h1 {
        color: black;
    }

    #form-data {
        padding: 10px;
    }

    .ganjil {
        background: lightgray;
    }

    .genap {
        background: white;
    }
</style>
    <link rel="stylesheet" href="me/style.css">
</head>
<body>
    <h1>Selamat Datang</h1>
    <h1 style="color: grey">Form Data Karyawan</h1>
    <form action="" method="post" id="form-data">
        <table>
            <tr class="ganjil">
                <td>Nama Karyawan</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama"/></td>
            </tr>
            <tr class="genap">
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="gender" id="gender" value="Laki-Laki">Laki-Laki<br> 
                    <input type="radio" name="gender" id="gender" value="Perempuan">Perempuan<br> 
                </td>
            </tr>
            <tr class="ganjil">
                <td>Status</td>
                <td>:</td>
                <td>
                    <select name="status" id="status">
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                    </select>
                </td>
            </tr>
            <tr class="genap">
                <td>Golongan</td>
                <td>:</td>
                <td>
                    <input type="checkbox" name="kendaraan[]" id="kendaraan" value="mobil">Mobil<br>
                    <input type="checkbox" name="kendaraan[]" id="kendaraan" value="motor">Motor<br>
                    <input type="checkbox" name="kendaraan[]" id="kendaraan" value="pesawat">Pesawat<br>
                    <input type="checkbox" name="kendaraan[]" id="kendaraan" value="sepeda">Sepeda<br>
                </td>
            </tr>
            <tr class="ganjil">
                <td>Gaji Pokok</td>
                <td>:</td>
                <td><input type="number" name="gaji" id="gaji"></td>
            </tr>
            <tr class="genap">
                <td></td>
                <td></td>
                <td><input type="submit" name="btnSimpan" id="btnSimpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
    <?php
    // pengecekan, apakah btnSimpan di klik atau ada perubahan nilai
    if(isset($_POST['btnSimpan'])) {
        $namaKaryawan = $_POST['nama'];
        $jenisKelamin = $_POST['gender'];
        $statusKaryawan = $_POST['status'];
        $kendaraanKaryawan = $_POST['kendaraan'];
        $gajiKaryawan = $_POST['gaji'];

        echo $namaKaryawan . "<br>";
        echo $jenisKelamin. "<br>";
        echo $statusKaryawan. "<br>";
        foreach($kendaraanKaryawan as $k) {
            echo "$k <br>";
        }
        echo $gajiKaryawan. "<br>";
    }
        ?>
</body>
</html>