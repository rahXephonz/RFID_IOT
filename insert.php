<?php 
    include "koneksi.php";

    //baca ID Data yang akan di edit
    if(isset($_POST['insert'])) //Sesuai dengan Name di button
    {
        //baca isi inputan form
        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
    

        //simpan tabel data siswa
        $simpan = mysqli_query($konek, "insert into siswa(nokartu, 
            nama, alamat)values('$nokartu', '$nama', '$alamat')");

        //jika data tersimpan maka menampilkan pesan Tersimpan
        //Kembali kedata Karyawan

        if($simpan){
            $_SESSION['info'] = 'Disimpan';
            echo "
            <script>
                alert('Data Berhasil Disimpan');
                document.location.href='tambahdata.php'
            </script>";
        }
        else{
            $_SESSION['info'] = 'Gagal';
            echo "
            <script>
                alert('Data Gagal Disimpan');
                document.location.href='tambahdata.php'
            </script>";
        }
    }

?>