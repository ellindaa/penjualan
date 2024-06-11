<!-- modul 10 -->
<?php
    $idbarang = $_GET["idbarang"];
    include "koneksi.php";
    $sql = "SELECT * FROM barang WHERE idbarang = '$idbarang'";
    $hasil = mysqli_query($kon, $sql);
    if(!$hasil) die ("Gagal Query....");

    $data = mysqli_fetch_array($hasil);
    $nama = $data["nama"];
    $harga = $data["harga"];
    $stok = $data["stok"];
    $foto = $data["foto"];
?>
<!-- akhir modul 10 -->


<h2>.:: EDIT BARANG ::.</h2>
<form action="barang_simpan.php" method="post" encyptype="multipart/form-data">
<!-- modul 10 -->
<input type="hidden" name="idbarang" value="<?php  echo $idbarang;?>">    
<!-- akhir  -->
<!-- penambahan value pada masing - masing variabel -->
<table border="1">
        <tr>
            <td>Nama Barang</td>
            <td><input type="text" name="nama" value="<?php  echo $nama;?>"/></td>
        </tr>
        <tr>
            <td>Harga Jual</td>
            <td><input type="text" name="harga" value="<?php  echo $harga;?>" /></td>
        </tr>
        <tr>
            <td>Stok</td>
            <td><input type="text" name="stok" value="<?php  echo $stok;?>"/></td>
        </tr>
        <tr>
            <td>Gambar [max=1.5MB]</td>
            <!-- modul 10 -->
            <td>
                <input type="file" name="foto" >
                <input type="hidden" name="foto_lama" value="<?php  echo $foto;?>"/><br>
                <img src="<?php echo "thumb/t_".$foto; ?>" width="100px" />
            </td>
            <!-- akhir modul 10 -->
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Simpan" name="proses" />
                <input type="reset" value="Reset" name="reset" />
            </td>
        </tr>
    </table>
</form>