<?php 
    $nama_barang ="";
    if(isset($_POST["nama_barang"]))
        $nama_barang = $_POST["nama_barang"];

    include "koneksi.php";
    // $sql = "SELECT * FROM barang ORDER BY idbarang DESC";
    $sql = "SELECT * FROM barang WHERE nama LIKE '%".$nama_barang."%' ORDER BY idbarang DESC";
    $hasil = mysqli_query($kon, $sql);
    if(!$hasil)
        die("Gagal query ..." .mysqli_error($kon));
?>
<a href="barang_isi.php">INPUT BARANG</a>
&nbsp; &nbsp; &nbsp;
<a href="barang_cari.php">CARI BARANG</a>
<table border="1">
    <tr>
        <th>Foto</th>
        <th>Nama Barang</th>
        <th>Harga Jual</th>
        <th>Stok</th>
        <!-- mmodul 10 -->
        <th>Operasi</th>
        <!-- akhir -->
    </tr>
    <?php
        $no = 0;
        while($row = mysqli_fetch_assoc($hasil)){
            echo "<tr>";
            echo "<td> <a href='pict/{$row['foto']}'><img src='thumb/t_{$row['foto']}' width='100' /></a></td>";
            echo "<td>".$row['nama']."</td>";
            echo "<td>".$row['harga']."</td>";
            echo "<td>".$row['stok']."</td>";
            // modul 10
            echo "<td>";
            echo "<a href='barang_edit.php?idbarang=" .$row['idbarang'] ."'>EDIT</a>";
            echo "&nbsp;&nbsp;";
            echo "<a href='barang_hapus.php?idbarang=" .$row['idbarang'] ."'>HAPUS</a>";
            echo "</td>";
            // akhir modul 10
            echo "</tr>";
        }

    ?>
</table>