<?php 

    include "koneksi.php";

    //baca data id yang akan dihapus

    $id = $_GET['id'];

    //hapus data

    $hapus = mysqli_query($konek, "DELETE from siswa WHERE id ='$id' ");
    
    //Jika berhasil maka akan tampilkan pesan terhapus
    //dan kemudian kembali ke data siswa

    header('location: datasiswa.php?m=1');

?>