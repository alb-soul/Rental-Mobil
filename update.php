<?php
    include 'konek.php';

    $id_sewa = $_POST['id_penyewaan'];

    $sql = "update Penyewaan set status = 'Kembali' where id_penyewaan = '$id_sewa'";

    mysqli_query($koneksi, $sql);

    header("location:transaksi.php");



?>