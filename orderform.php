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
            <h1>Tambah Transaksi</h1>
            <h2>Rental Mobil RIPA</h2>
        </header>
        <main class="order">
            <form action="order.php" method="post">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Nama" required>
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Alamat" required>
                <label for="nohp">No HP</label>
                <input type="text" name="nohp" id="nohp" placeholder="No HP" required>

                <label for="mobil">Mobil</label>
                <select name="mobil" id="mobil" onchage="harga.value = this.value">
                    <?php
                        //$no = 1;
                        $sql = mysqli_query($koneksi, "select nama_mobil, harga_sewa from Mobil");
                            while($data = mysqli_fetch_array($sql)) {  
                        ?>
                        <option value="<?php echo $data['nama_mobil']; ?>"><?php echo $data['nama_mobil']; ?></option>
                        <?php
                        }
                    ?>
                </select>

                <label for="harga">Harga per hari</label>
                <input type="text" name="harga" id="harga" placeholder="Harga" value="58000" disabled required>

                <label for="tglpinjam">Tanggal Pinjam</label>
                <input type="date" name="tglpinjam" id="tglpinjam" placeholder="Tanggal Pinjam" required>
                <label for="tglkembali">Tanggal Kembali</label>
                <input type="date" name="tglkembali" id="tglkembali" placeholder="Tanggal Kembali" required>
                <br>
                <button type="submit" name="submit">Tambah</button>
            </form>

        </main>

        <!--create button to back to transaksi.php-->
        <div style="margin-bottom: 40px; text-align: center;"><a href="transaksi.php" style="text-decoration: none; color: red; border: 1px solid red; padding: 5px; border-radius: 8px;">:: &#9756; Kembali ::</a></div>

        <footer>
            <h4>&#169; <script>document.write(new Date().getFullYear())</script> by Imamuddin Al Mustaqim 	&#128153;</h4>
        </footer>

        <script>
                    var mobil = document.getElementById('mobil');
                    var harga = document.getElementById('harga');
                    //create code if mobil changed fill harga field
                    mobil.addEventListener('change', function() {
                        if(mobil.value == 'Avanza S3') {
                            harga.value = 58000;
                        } else if(mobil.value == 'Xenia Xpred') {
                            harga.value = 50000;
                        } else if(mobil.value == 'Avanza G22') {
                            harga.value = 60000;
                        } else if(mobil.value == 'Honda Jazz') {
                            harga.value = 48000;
                        } else if(mobil.value == 'BMW Silv') {
                            harga.value = 70000;
                        } else if(mobil.value == 'Mitsubishi Ftren') {
                            harga.value = 53000;
                        }
                    });
                    

        </script>
    </body>
</html>