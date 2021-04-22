<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php"; ?>
    <title>Internet Of Things | Scan Kartu</title>
    <style>
        body{
            top: 100px;
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body id="body-pd">
    <?php include "menu.php"; ?>


    <!-- ISI -->
    <div class="container-fluid scan">
        <div id="cekkartu"></div>
    </div>


    <?php include "footer.php"; ?>
    <!--SCANNING MEMBACA KARTU-->
    <script>
        $(document).ready(function(){
            setInterval(function(){
                $("#cekkartu").load('bacakartu.php');
            }, 1000);
        });
    </script>
    <?php include "script.php"; ?>

</body>
</html>
