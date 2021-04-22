<?php 

    include "koneksi.php"; 

    //baca ID Data yang akan di edit

    //baca data siswa berdasarkan id
    $cari = mysqli_query($konek, "select * from siswa where id='$id'");
    $hasil = mysqli_fetch_array($cari);


    if(isset($_POST['btnSimpan'])) //Sesuai dengan Name di button
    {
        //baca isi inputan form

        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
    

        //simpan tabel data siswa
        $simpan = mysqli_query($konek, "update siswa set nokartu='$nokartu', nama='$nama', alamat='$alamat' where id='$id' ");

        //jika data tersimpan maka menampilkan pesan Tersimpan
        //Kembali kedata Siswa

        if($simpan)
        {
            echo "
                <script>
                    alert('Update Tersimpan');
                    document.location.href='datasiswa.php'
                </script>
            
            ";
        }

        else
        {
            echo "
                <script>
                    alert('Gagal Tersimpan');
                    document.location.href='datasiswa.php'
                </script>
            
            ";
        }
    } 

?>