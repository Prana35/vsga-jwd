<?php

function hitung_tarif($lama_parkir, $tarif)
{
  return $lama_parkir * $tarif;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarif Parkir Prana</title>
</head>

<body>
  <form action="" method="get">
    <li>
      <label for="no_polisi">No Polisi: </label>
      <input type="text" name="no_polisi" id="no_polisi" required>
    </li>
    <li>
      <label for="lama_parkir">Lama Parkir (jam): </label>
      <input type="number" name="lama_parkir" id="lama_parkir" min="0" required>
    </li>
    <button name="submit">Hitung</button>
  </form>
  <?php
  if (isset($_GET['submit'])) {
    $lama_parkir = $_GET['lama_parkir'];
    $tarif = 2000; // Tarif tetap 2000 rupiah per jam

    // Validasi input
    if ($lama_parkir < 0) {
      echo 'Lama parkir tidak bisa negatif.';
    } else {
      $hasil = hitung_tarif($lama_parkir, $tarif);
      echo 'Kendaraan dengan No. Polisi ' . $_GET['no_polisi'] . ' dikenakan tarif parkir Rp ' . number_format($hasil, 0, ',', '.') . ',-';
    }
  }
  ?>
</body>

</html>
