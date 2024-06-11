<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "toko_ol";

    $kon = mysqli_connect($host, $user, $pass);
    if (!$kon) {
        die("Gagal Koneksi.....");
    }
   
    $hasil = mysqli_select_db($kon, $dbName);
    if (!$hasil) {
        $hasil = mysqli_query($kon, "CREATE DATABASE $dbName");
        if (!$hasil) {
            die("Gagal Buat Database");
        } else {
            $hasil = mysqli_select_db($kon, $dbName);
            if (!$hasil) {
                die("Gagal Konek Database");
            }
        }
    }
   
    $sqlTabelBarang = "CREATE TABLE IF NOT EXISTS barang (
        idbarang INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
        nama VARCHAR(40) NOT NULL,
        harga INT NOT NULL DEFAULT 0,
        stok INT NOT NULL DEFAULT 0,
        foto VARCHAR(70) NOT NULL DEFAULT '',
        KEY(nama)
    )";

    mysqli_query($kon, $sqlTabelBarang) or die("Gagal Buat Tabel Barang");
    // echo "Tabel Barang Siap <hr/>";
?>

