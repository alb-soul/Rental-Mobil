<!DOCTYPE html>
<html>
    <head>
        <title>Tambah Transaksi</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>

        <?php
            include 'konek.php';
        ?>

        <header>
            <h1>Data Pelangan</h1>
            <p style="font-family: Arial; font-weight: bolder;">Data Detail Pelanggan</p>
        </header>
        <main class="view">
            <!-- ambil data peminjam dari database -->
            <?php
                $id_penyewaan = $_GET['id_penyewaan'];
                $sql = "select * from Peminjam inner join Penyewaan on Peminjam.id_peminjam = Penyewaan.id_peminjam where id_penyewaan = '$id_penyewaan'";
                $result = mysqli_query($koneksi, $sql);
                $row = mysqli_fetch_array($result);

                $id_peminjam = $row['id_peminjam'];
                $nama_peminjam = $row['nama_peminjam'];
                $alamat_peminjam = $row['alamat_peminjam'];
                $no_telp = $row['no_hp_peminjam'];
            
            ?>
            <div style="text-align: center; margin-bottom: 20px;">
                <h3 style="font-family: Arial; font-weight: bolder;">Data Peminjam</h3>
            </div>
            <table border="1" id="customers">
                <tr>
                    <td class="judul">ID Peminjam</td>
                    <td><?php echo $id_peminjam ?></td>
                </tr>
                <tr>
                    <td class="judul">Nama Peminjam</td>
                    <td><?php echo $nama_peminjam ?></td>
                </tr>
                <tr>
                    <td class="judul">Alamat Peminjam</td>
                    <td><?php echo $alamat_peminjam ?></td>
                </tr>
                <tr>
                    <td class="judul">No HP Peminjam</td>
                    <td><?php echo $no_telp ?></td>
                </tr>
            </table>

        </main>

        <!--create button to back to transaksi.php-->
        <div style="margin-bottom: 40px; text-align: center;"><a href="transaksi.php" style="text-decoration: none; color: red; border: 1px solid red; padding: 5px; border-radius: 8px;">:: &#9756; Kembali ::</a></div>

        <footer>
            <h4>&#169; <script>document.write(new Date().getFullYear())</script> by Imamuddin Al Mustaqim 	&#128153;</h4>
        </footer>
    </body>
</html>