<?php 

    include "koneksi.php"; 
    //baca ID Data yang akan di edit
    include "update.php"

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Internet Of Things | Tambah Data</title>
</head>
<body id="body-pd">
    <?php include "menu.php"; ?>
    
    <!-- ISI -->

    <div class="container-fluid tambahdata">
        <a href="datasiswa.php"><button class="btn btn-success" style="margin-top:2rem;">Kembali</button></a>
        <h1>Tambah Data Siswa</h1>

        <form method="POST">
            <div class="form-group">
                <label style="font-size: 20px; margin-left: 0.2rem;"> No.Kartu</label>
                <input type="text" name="nokartu" id="nokartu" placeholder="Nomor Kartu RFID" class="form-control" style="width:500px" value="<?php echo $hasil['nokartu']; ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 20px; margin-left: 0.2rem;"> Nama Siswa</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Siswa Teknik Otomasi Industri" class="form-control" style="width:500px"  value="<?php echo $hasil['nama']; ?>">
            </div>
            <div class="form-group">
                <label style="font-size: 20px; margin-left: 0.2rem;"> Alamat Siswa</label>
                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat Siswa Teknik Otomasi Industri" style="width:500px; height:100px;"> <?php echo $hasil['alamat']; ?></textarea>
            </div>
            <button class="btn btn-primary" name="btnSimpan" id="btnSimpan" style="margin-top:2rem;">Simpan</button>
        </form>
    </div>

    <?php include "footer.php"; ?>
    <?php include "script.php"; ?>


</body>
</html>