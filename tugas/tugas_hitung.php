<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Hitung BMI 1 Prana</title>
    <script>
        function validateForm() {
            const berat = document.getElementById('berat').value;
            const tinggi = document.getElementById('tinggi').value;
            if (berat <= 0 || tinggi <= 0) {
                alert("Berat badan dan tinggi badan harus lebih dari 0");
                return false;
            }
            return true;
        }

        function hitungBMI() {
            if (!validateForm()) return;
            const nama = document.getElementById('nama').value;
            const berat = parseFloat(document.getElementById('berat').value);
            const tinggi = parseFloat(document.getElementById('tinggi').value);
            const bmi = berat / (tinggi * tinggi);
            alert("Nama: " + nama + "\nBMI: " + bmi.toFixed(2));
        }
    </script>
</head>
<body>
    <form onsubmit="event.preventDefault(); hitungBMI();">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>
            <tr>
                <td>Berat Badan (kg)</td>
                <td>:</td>
                <td><input type="number" name="berat" id="berat" min="1" required></td>
            </tr>
            <tr>
                <td>Tinggi Badan (m)</td>
                <td>:</td>
                <td><input type="number" name="tinggi" id="tinggi" step="0.01" min="0.01" required></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;"><input type="submit" value="Hitung"></td>
            </tr>
        </table>
    </form>
</body>
</html>
