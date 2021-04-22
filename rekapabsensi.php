<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Internet Of Things | Rekap Absen</title>
</head>
<body id="body-pd">
    <?php include "menu.php"; ?>


    <!-- ISI -->
    <div class="container-fluid rekap">
        <h1 style="font-weight: bold;">Rekap Absen</h1> <br>
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th style="width: 10px; text-align: center;">No</th>
                    <th style="text-align: center;">Nama Siswa</th>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Jam Masuk</th>
                    <th style="text-align: center;">Jam Istirahat</th>
                    <th style="text-align: center;">Jam Pulang</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            
                include "koneksi.php";
                //Baca tabel absensi dan realisasikan dengan tabel data siswa 
                //berdasarkan nomor kartu RFID untuk tanggal hari ini

                //baca tanggal
                date_default_timezone_get('Asia/Jakarta');
                $tanggal = date('Y-m-d');

                //filter absensi berdasarkan tanggal saat ini
                $sql = mysqli_query($konek, "select b.nama, a.tanggal, a.jam_masuk, a.jam_istirahat, a.jam_pulang 
                        from absensi a,siswa b WHERE a.nokartu=b.nokartu and a.tanggal='$tanggal'");

                $no = 0;
                while($data = mysqli_fetch_array($sql))
                {
                    $no++;

            ?>

                <tr style="background-color: #E0E5EC; color: black;">
                    <td style="text-align: center;"><?php echo $no; ?></td>
                    <td style="text-align: center;"><?php echo $data['nama']; ?></td>
                    <td style="text-align: center;"><?php echo $data['tanggal']; ?></td>
                    <td style="text-align: center;"><?php echo $data['jam_masuk']; ?></td>
                    <td style="text-align: center;"><?php echo $data['jam_istirahat']; ?></td>
                    <td style="text-align: center;"><?php echo $data['jam_pulang']; ?></td>
                </tr>
                <?php 
                    // Delete data berdasarkan tanggal
                    mysqli_query($konek, "DELETE FROM 'table' WHERE 'timestamp' &gt; DATE_SUB(NOW(), INTERVAL 10 MINUTE)");
                } ?>
            </tbody>
        </table>
    </div>


    <?php include "footer.php"; ?>
    <?php include "script.php"; ?>

</body>
</html>