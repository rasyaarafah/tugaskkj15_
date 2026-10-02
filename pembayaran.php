<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form pembayaran</title>
</head>
<body>

<h2>Form pembayaran barang</h2>


<form action="" method="POST">
    <label>Nama barang:</label><br>
    <input type="text" name="nama_barang" required><br><br>

    <label>Harga satuan rupiah:</label><br>
    <input type="number" name="harga_satuan" min="0" required><br><br>

    <label>Jumlah pembelian:</label><br>
    <input type="number" name="jumlah_pembelian" min="1" required><br><br>

    <input type="submit" name="submit" value="Hitung Total">
</form>

<hr>
<h1>hasil hitung</h1>
<?php
// cek request dengan isset

if (isset($_POST['submit'])) {
    $nama_barang = $_POST['nama_barang'];
    $harga_satuan = $_POST['harga_satuan'];
    $jumlah_pembelian = $_POST['jumlah_pembelian'];

    // Validasi

    if ($harga_satuan < 0 || $jumlah_pembelian < 1) {
        echo "<p style='color:red;'>Harga tidak boleh negatif dan jumlah pembelian minimal 1!</p>";
    } else {

        // Hitung total harga
        $total_harga = $harga_satuan * $jumlah_pembelian;

        //diskon

        if ($total_harga >= 500000) {
            $diskon_persen = 20;
        } elseif ($total_harga >= 250000) {
            $diskon_persen = 10;
        } else {
            $diskon_persen = 0;
        }

        
        $diskon = ($diskon_persen / 100) * $total_harga;
        $total_bayar = $total_harga - $diskon;

        //hasil 
        
        echo "Nama Barang: " . $nama_barang . "<br>";
        echo "Harga Satuan: Rp " . $harga_satuan . "<br>";
        echo "Jumlah Pembelian: " . $jumlah_pembelian . "<br>";
        echo "Total Harga: Rp " . $total_harga . "<br>";
        echo "Diskon (" . $diskon_persen . "%): Rp " . $diskon . "<br>";
        echo "<strong>Total Pembayaran: Rp " . $total_bayar;
    }
}
?>

</body>
</html>