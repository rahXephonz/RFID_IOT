<?php 


$dname= "localhost";
$uname= "root";
$password = "";

$db_name = "admin_db";

$koneksi = mysqli_connect($dname, $uname, $password, $db_name);

if (!$koneksi) {
    echo "Connection failed!";
}