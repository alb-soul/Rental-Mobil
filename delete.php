<?php
    include 'konek.php';

    $id_sewa = $_POST['id_penyewaan'];

    $sql_delete_peminjam = "delete from Penyewaan where id_penyewaan = '$id_sewa'";
    // $sql_delete_penyewaan = "delete from Penyewaan where id_peminjam = '$id'";

    // mysqli_query($koneksi, $sql_delete_penyewaan);
    mysqli_query($koneksi, $sql_delete_peminjam);

    header("location:transaksi.php");

?>