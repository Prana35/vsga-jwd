<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas BMI</title>

    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
    <!-- AWAL BAGIAN NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi VSGA</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- END BAGIAN NAVBAR -->

    <?php
        $daftarKota = array("Lampung", "Jakarta", "Surabaya");   
    ?>
    <!-- $daftarKotalain = array['Lampung', 'Jakarta', 'Surabaya']; -->

    <div class="container-fluid">
        <h4>Form Data Karyawan</h4>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Karyawan</label> <!-- Input Karyawan -->
                <input typer="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label> <!-- Input Jenis Kelamin -->
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" checked>
                    <label class="form-check-label" for="gender">
                    Laki-Laki
                </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="gender" checked>
                    <label class="form-check-label" for="gender"></label>
                    Perempuan
                </label>
                </div>
            </div>
            <div class="mb-3">
                <label for="golongan" class="form-label">Golongan</label>
                <select class="form-select">
                    <option selected></option>
                    <option value="I">I</option>
                    <option value="II">II</option>
                    <option value="III">III</option>
                    <option value="IV">IV</option>
                </select>
            <div class="mb-3">
                <label for="kota" class="form-label">Asal Kota</label>
                <select class="form-select">
                    <?php
                    // menampilkan isi array kedalam combobox
                    foreach($daftarKota as $dk) {
                        echo "<option value='$dk'> $dk </option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="kendaraan" class="form-label">Kendaraan</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="kendaraan[]" id="kendaraanMotor">
                    <label class="form-check-label" for="kendaraanMotor"></label>
                    Motor
                </label>
            </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="kendaraan" id="KendaraanMobil">
                    <label class="form-check-label" for="kendaraanMobil"></label>
                    Mobil
                </label>
            </div>
        </form>
    </div>
</body>

<script src="js/bootstrap.js"></script>

</html>