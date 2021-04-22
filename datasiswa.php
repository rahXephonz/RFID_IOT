<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Internet Of Things | Data Siswa</title>
</head>
<body id="body-pd">
    <?php include "menu.php"; ?>


    <!-- ISI -->
    <div class="container-fluid data">
        <h1 style="font-weight: bold">Data Siswa</h1> <br>
        <table class="table table-bordered table-dark">
            <thead>
                <tr>
                    <th style="width: 10px; text-align: center">No</th>
                    <th style="width: 300px; text-align: center">No.Kartu</th>
                    <th style="width: 350px; text-align: center">Nama Siswa</th>
                    <th style="text-align: center">Alamat</th>
                    <th style="width: 300px; text-align: center">Aksi</th>
                </tr>
            </thead>
            <tbody>

                <!-- Menghubungkan Data di SQLI untuk ditampilkan ke tabel-->
                <?php 
                    
                    include "koneksi.php";
                    //baca data
                    $sql = mysqli_query($konek, "SELECT * FROM siswa" );
                    $no = 0;
                    while($data = mysqli_fetch_array($sql))
                    {
                        $no++;

                ?>


                <tr style="background-color: #E0E5EC; color: black;">
                    <td style="text-align: center;"><?php echo $no; ?></td>
                    <td><?php echo $data['nokartu']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td style="text-align: center;">
                        <a style="color: black;" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> | <a style="color: black;" href="delete.php?id=<?php echo $data['id']; ?>" class="btn-del">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- tombol tambah data siswa -->
        <a href="tambahdata.php"> <button class="btn btn-primary">Tambah Data Siswa</button> </a>
    </div>

    <?php include "footer.php"; ?>
    
    <script>
        $('.btn-del').on('click', function(e){
            e.preventDefault();
            const href = $(this).attr('href')

            Swal.fire({
                title: 'Anda Yakin?',
                text: "Anda tidak bisa mengembalikan ini lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                    if (result.value){
                        document.location.href = href;
                    }
            });

        });
    </script>
    <?php include "script.php"; ?>


</body>
</html>