<!DOCTYPE html>
<head>
    <title>Rental RIPA - Transaksi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <style>

    </style> -->

</head>
<body>
    <header>
        <h1>Rental    Mobil   RIPA</h1>
        <p style="font-family: Arial; font-weight: bolder;">Data Transaksi</p>
    </header>
    

    <?php
        include 'konek.php';
    ?>

    <main class="listdata">

    <a href="orderform.php">
        <button type="submit" name="submit" class="tambah">Tambah Transaksi +</button>
    </a>
    <?php
        $sql_fetch_pendapatan = "select sum((tgl_akhir_sewa-tgl_transaksi)*harga_sewa) AS 'Total_Pendapatan_Rental' from Penyewaan inner join Mobil on Penyewaan.id_mobil = Mobil.id_mobil";
        $result = mysqli_query($koneksi, $sql_fetch_pendapatan);
        $row = mysqli_fetch_assoc($result);
        $total_pendapatan = $row['Total_Pendapatan_Rental'];
        $total_pendapatan = number_format($total_pendapatan, 2, ',', '.')
    ?>
    <div class="ttlpendapatan">
        <h4>Total Pendapatan Rental : Rp. <?php echo $total_pendapatan ?></h4>
    </div>

    <table border="1" id="customers">
        <tr>
            <th>ID Penyewaan</th>
            <th>Nama Peminjam</th>
            <th>Mobil</th>
            <th>Tanggal Awal Sewa</th>
            <th>Tanggal Akhir Sewa</th>
            <th>Total Bayar</th>
            <th>Status</th>
            <th id="opsi"></th>
        </tr>

        <?php
            $no = 0;
            $sql = mysqli_query($koneksi, "select id_penyewaan, nama_peminjam,nama_mobil, tgl_transaksi, tgl_akhir_sewa, sum((tgl_akhir_sewa-tgl_transaksi)*harga_sewa) as 'Total_Bayar', status from Peminjam inner join Penyewaan on Peminjam.id_peminjam = Penyewaan.id_peminjam inner join Mobil on Penyewaan.id_mobil = Mobil.id_mobil group by id_penyewaan;");
            while($data = mysqli_fetch_array($sql)) {
        ?>
        <tr>
            <td><?php echo $data['id_penyewaan'] ?></td>
            <td><?php echo $data['nama_peminjam'] ?></td>
            <td><?php echo $data['nama_mobil'] ?></td>
            <td><?php echo $data['tgl_transaksi'] ?></td>
            <td><?php echo $data['tgl_akhir_sewa'] ?></td>
            <td><?php echo $data['Total_Bayar'] ?></td>
            <td><?php
             echo $data['status'];
            ?>
            </td>

            <td id="opsi">
                
                <form style="display: inline;" action="view.php" method="get">
                    <button id="opsi-view" class="btn"><i class="fa fa-eye">
                        <input type="hidden" name="id_penyewaan" value="<?php echo $data['id_penyewaan'] ?>">
                    </i></button>
                </form>

                <form style="display: inline;" action="update.php" method="post">
                    <button id="opsi-edit" style="<?php
                        $warna = "";
                        if($data['status'] == "Kembali") {
                            $warna = "background-color: #4CAF50";
                        }
                        else {
                            $warna = "background-color: grey";
                        }
                        echo $warna;

                     ?>" class="btn"><i class="fa fa-check">
                        <input type="hidden" name="id_penyewaan" value="<?php echo $data['id_penyewaan'] ?>">
                    </i></button>
                </form>

                <form style="display: inline;" action="delete.php" method="post">
                    <button id="opsi-delete" class="btn"><i class="fa fa-trash">
                        <input type="hidden" name="id_penyewaan" value="<?php echo $data['id_penyewaan'] ?>">
                    </i></button>
                </form>

            </td>
            
        </tr>

    <?php
        }
    ?>
    </table>
    </main>

    <script>




    </script>

    <br>
</body>
