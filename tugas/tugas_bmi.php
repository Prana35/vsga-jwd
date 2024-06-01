<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas BMI 2</title>

    <link rel="stylesheet" href="../materi/css/bootstrap.css">
    
    <style>
    h4 {
        color: cadetblue;
    }

    #form-label {
        padding: 10px;
    }

</style>

</head>
<body>
    <!-- AWAL BAGIAN NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Aplikasi Hitung BMI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!-- END BAGIAN NAVBAR -->

    <div class="container-fluid">
        <h4>Form Hitung BMI</h4>
        <form action="prosesbmi.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label> <!-- Input Nama Anda -->
                <input typer="text" name="nama" id="nama" class="form-control">
            </div>
            <div class="mb-3">
                <label for="berat" class="form-label">Berat Badan (Kg)</label> <!-- Input Berat Anda -->
                <input typer="number" name="berat" id="berat" class="form-control">
                <div id="numberHelp" class="form-text">Masukkan Dengan Angka</div>
            </div>
            <div class="mb-3">
                <label for="tinggi" class="form-label">Tinggi Badan (M)</label> <!-- Input Tinggi Anda -->
                <input typer="decimal" name="tinggi" id="tinggi" class="form-control">
                <div id="numberHelp" class="form-text">Masukkan Dengan Angka</div>
            </div>
            <button type="submit" class="btn btn-primary" name="btnSubmit" id="btnSubmit">Submit</button>
        </form>
    </div>
</body>

<script src="../materi/js/bootstrap.js"></script>

</html>