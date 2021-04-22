<?php

session_start();
include "database.php";

if(isset($_POST['uname']) && isset($_POST['password'])){


    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);


    if(empty($uname)){
        header("Location: home.php?error=Username dibutuhkan!");
        exit();
    }

    else if(empty($pass)) {
        header("Location: home.php?error=Password dibutuhkan!");
        exit();
    }

    else {
        $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pass' ";

        $result = mysqli_query($koneksi, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();
            }

            else {
                header("Location: home.php?error=Username dan Password Salah!");
                exit();
            }
        }
        else{
            header("Location: home.php?error=Username dan Password Salah!");
            exit();
        }
    }
    
}

else{
    header("Location: home.php");
    exit();
}

?>