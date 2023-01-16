<?php
    include 'konek.php';

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $nohp = $_POST['nohp'];
    $mobil = $_POST['mobil'];
    $tglawal = $_POST['tglpinjam'];
    $tglakhir = $_POST['tglkembali'];
    $status = "Belum Kembali";

    //create array to store id_mobil
    $idmobil;

    if ($mobil=="Avanza S3") {
        $idmobil = 1;
    } elseif ($mobil=="Xenia Xpred") {
        $idmobil = 2;
    } elseif ($mobil=="Avanza G22") {
        $idmobil = 3;
    } elseif ($mobil=="Honda Jazz") {
        $idmobil = 4;
    } elseif ($mobil=="BMW Silv") {
        $idmobil = 5;
    } elseif ($mobil=="Mitsubishi Ftren") {
        $idmobil = 6;
    }

    mysqli_query($koneksi, "insert into Peminjam (nama_peminjam, alamat_peminjam, no_hp_peminjam, id_karyawan) values ('$nama', '$alamat', '$nohp', 1)");

    $sql_fetch_id_peminjam = "select id_peminjam from Peminjam where nama_peminjam = '$nama'";

    $result = mysqli_query($koneksi, $sql_fetch_id_peminjam);
    $row = mysqli_fetch_assoc($result);
    $id_peminjam = $row['id_peminjam'];


    // $result = $conec->query($sql_fetch_id);
    // $row = $result->fetch_assoc();
    // $id = $row['id_peminjam'];

    mysqli_query($koneksi, "insert into Penyewaan (tgl_transaksi, tgl_akhir_sewa, id_peminjam, id_mobil, status) values ('$tglawal', '$tglakhir', '$id_peminjam', '$idmobil', '$status')");
    

    header("location:transaksi.php");




?>