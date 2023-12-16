<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Nilai Mahasiswa</title>
</head>
<body>
    <form method="POST" action="">
        <label for="No_transfer">No transfer :</label>
        <input type="text" id="No_transfer" name="No_transfer" required> <br>
        <label for="Nama_Pembeli">Nama Pembeli:</label>
        <input type="text" id="Nama_Pembeli" name="Nama_Pembeli" required> <br>
        <label for="Judul_buku">Judul buku:</label>
        <input type="text" id="Judul_buku" name="Judul_buku" required> <br>
        <label for="Jumlah_buku">Jumlah buku:</label>
        <input type="text" id="Jumlah_buku" name="Jumlah_buku" required> <br>
        <label for="harga_buku">Harga buku:</label>
        <input type="text" id="harga_buku" name="harga_buku" required> <br>
        <input type="submit" name="tombol" value="Submit">
    </form>
    
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $noTransfer = $_POST["No_transfer"];
    $namaPembeli = $_POST["Nama_Pembeli"];
    $judulBuku = $_POST["Judul_buku"];
    $jumlahBuku = $_POST["Jumlah_buku"];
    $hargaBuku = $_POST["harga_buku"];

    // Konversi jumlahBuku dan hargaBuku menjadi angka
    $jumlahBuku = (int)$jumlahBuku;
    $hargaBuku = (float)$hargaBuku;
    $diskonTransaksi = 0;
    $diskonBelanja = 0;

    // Hitung total pembayaran
    $totalPembayaran = $jumlahBuku * $hargaBuku;

    // Hitung diskon belanja 10%
    if ($totalPembayaran >= 100000)
   $diskonBelanja = $totalPembayaran * 0.1;

    // Hitung diskon transaksi 5%
    if ($totalPembayaran >= 100000)
    $diskonTransaksi = $totalPembayaran * 0.05;
    $totalPembayaranAkhir = $totalPembayaran - $diskonTransaksi - $diskonBelanja;

    echo "<h2>Detail Pembelian</h2>";
    echo "No Transfer: " . htmlspecialchars($noTransfer) . "<br>";
    echo "Nama Pembeli: " . htmlspecialchars($namaPembeli) . "<br>";
    echo "Harga: Rp" . number_format($totalPembayaran) . "<br>";
    echo "Diskon Belanja 10%: Rp" . number_format($diskonBelanja) . "<br>";
    echo "Diskon Transaksi 5%: Rp" . number_format($diskonTransaksi) . "<br>";
    echo "Total Pembayaran Setelah Diskon: Rp" . number_format($totalPembayaranAkhir) . "<br>";
}
?>
</body>
</html>
