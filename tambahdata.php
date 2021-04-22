<?php
    
    include "koneksi.php";
    //Jika tombol Simpan diklik maka
    include "insert.php";

    //kosongkan tabel
    mysqli_query($konek, "DELETE FROM tmprfid");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Internet Of Things | Tambah Data</title>
</head>
<body id="body-pd">

    <?php include "menu.php"; ?>
    
    <div class="container-fluid tambahdata">
        <a href="datasiswa.php"><button class="btn btn-success" style="margin-top:2rem;">Kembali</button></a>
        <h1>Tambah Data Siswa</h1>

        <div class="icon">
            <img src="images/data.png" alt="" width="560px" height="600px">
        </div>

        <form method="POST">
            <div id="norfid"></div>

            <div class="form-group">
                <label style="font-size: 20px; margin-left: 0.2rem;"> Nama Siswa</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Siswa Teknik Otomasi Industri" class="form-control" style="width:500px">
            </div>
            <div class="form-group">
                <label style="font-size: 20px; margin-left: 0.2rem;"> Alamat Siswa</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Siswa Teknik Otomasi Industri" style="width:500px; height:100px;"></textarea>
            </div>
            <input type=submit class="btn btn-primary btn-save" name="insert" style="margin-top:2rem;" value=Simpan></input>
        </form>
    </div>

    <?php include "footer.php"; ?>

    <!-- Pembacaan no kartu RFID -->
    <script type="text/javascript">
        $(document).ready(function(){
            setInterval(function()
            {
                $("#norfid").load('nokartu.php');
            }, 0); //pembacaan no kartu.php setiap 0 absolute tidak ada nilai refresh terus menerus
        });
        
    </script>

    <?php include "script.php"; ?>

</body>
</html>