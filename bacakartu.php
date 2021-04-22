<?php
    include "koneksi.php";
    //Baca tabel status untuk mode absensi

    $sql = mysqli_query($konek, "select * from status");
    $data = mysqli_fetch_array($sql);
    $mode_absen = $data['mode'];

    //mode uji absen
    $mode = "";
    if($mode_absen == 1){
        $mode = "Masuk";
    }
    else if($mode_absen == 2) {
        $mode = "Istirahat";
    }
    else if($mode_absen == 3) {
        $mode = "Pulang";
    }

    //baca tabel tmprfid
    $baca_kartu = mysqli_query($konek, "select * from tmprfid");
    $data_kartu = mysqli_fetch_array($baca_kartu);
    $nokartu = $data_kartu['nokartu'];
?>

<div class="container-fluid" style="text-align: center; font-weight: bolder;">
    <?php 
        //jika nomor kartu
        if ($nokartu == "") { ?>
            

        <h3 style="margin-top: 7rem;">Absen : <?php echo $mode; ?></h3> <br>
        <h3>Silahkan Tempel Kartu RFID Anda</h3>
        <img src="images/scan.png" alt="scan"> <br>
        <img src="images/animasi2.gif" alt="animasi">
        
    <?php } else {
           // cek nomor kartu rfid tersebut apakah terdaftar ditabel data siswa
           $cari_siswa = mysqli_query($konek, "select * from siswa where nokartu='$nokartu' ");
           $jumlah_data = mysqli_num_rows($cari_siswa);

           if($jumlah_data == 0)
           {
               echo "<br><br><br><br><br><br><br><h1>Maaf! Kartu Tidak Ditemukan</h1>";
           }

           else
           {
               //ambil nama siswa
               $data_siswa = mysqli_fetch_array($cari_siswa);
               $nama = $data_siswa['nama'];

               //tanggal dan jam today
               date_default_timezone_set("Asia/Jakarta");
               $tanggal = date('Y-m-d');
               $jam     = date('h:i:sa');

               //cek ditabel absensi , apakah no kartu itu sudah ada sesuai tanggal ini. 
               //Apabila belum ada, maka dianggap absen masuk, tapi kalau sudah ada maka 
               //update data sesuai mode absensi

               $cari_absen = mysqli_query($konek, "select * from absensi 
                    where nokartu='$nokartu' and tanggal='$tanggal' ");
               // hitung jumlah datanya

               $jumlah_absen = mysqli_num_rows($cari_absen);

               if($jumlah_absen == 0)
               {
                   echo "<br><br><br><br><br><br><br><h1>Selamat Datang, <br> $nama! <br> Semoga Harimu Menyenangkan :)</h1>";
                   mysqli_query($konek, "insert into absensi(nokartu, 
                        tanggal, jam_masuk)values('$nokartu', '$tanggal', '$jam') ");
               }

               else
               {
                   //update sesuai pilihan mode absen
                   if($mode_absen == 2) 
                   {
                        echo "<br><br><br><br><br><br><br><h1>Selamat Istirahat, <br> $nama! <br> Semoga Istirahatmu Menyenangkan :)</h1>";
                        mysqli_query($konek, "update absensi set jam_istirahat='$jam'
                            where nokartu='$nokartu' and tanggal='$tanggal' ");
                   }
                   else if($mode_absen == 3) 
                   {
                        echo "<br><br><br><br><br><h1>Selamat Jalan, <br> $nama! <br> Semoga Selamat Sampai Tujuan :)</h1>";
                        mysqli_query($konek, "update absensi set jam_pulang='$jam'
                            where nokartu='$nokartu' and tanggal='$tanggal' ");
                   }
               }
           }
        } 
        
        //kosongkan kartu tabel rfid beradasarkan time
        mysqli_query($konek, "delete from tmprfid");
    ?>

</div>