<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "header.php" ?>
    <title>Internet Of Things | Login </title>
    <style>
        body{
            top: 100px;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(#33ccff 0%, #ff99cc 100%);
            align-items: center;
            justify-content: center;
            height: 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="circle"></div>
                <header class="myHed text-center">
                    <div class="far"><img src="images/scann.png"/></div>
                    <p>IOT | Absensi</p>
                </header>
                
                <form action="login.php" method="post" class="main-form text-center">

                    <?php if(isset($_GET['error'])) { ?>
                    
                        <p class="error"><?php echo $_GET['error']; ?> </p>

                    <?php } ?>

                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-user"></i>
                            <input type="text" name="uname" class="myInput" placeholder="Username">
                        </label>
                    </div>
                    <div class="form-group my-0">
                        <label class="my-0">
                            <i class="fas fa-lock"></i>
                            <input type="password" name="password" class="myInput" placeholder="Password">
                        </label>
                    </div>
                    <label class="check_1">
                        <input type="checkbox" checked>
                        Remember Me
                    </label>
                    <div class="form-group">
                        <button type="submit" class="button btn">Login</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <?php include "script.php"; ?>

</body>
</html>