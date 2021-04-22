<?php
    session_start();
    if (isset($_SESSION['id']) && isset($_SESSION['username']) ) {

?>

<header class="header pure-menu" id="header">
    <div class="header_toggle">
        <i class='bx bx-menu' id="header-toggle"></i>
    </div>
    <a href="logout.php"><button class="btn btn-dark" name="btnlogout" id="btnlogout">Logout</button></a>
</header>

    <div class="l-navbar pure-menu-list" id="nav-bar">
        <nav class="nav pure-menu-item">
            <div>
                <div class="nav_logo">
                    <i class='bx bxs-user-account nav_logo_icon' ></i>
                    <span class="nav_logo_name dashtext">Dashboard Menu</span>
                </div>
                <div class="nav_list">
                    <a href="index.php" class="nav_link active"> <!--kita rubah entar disini di cssnya dewngan clas active !-->
                        <i class='bx bx-grid-alt nav_icon' onclick="myFunction()" ></i>
                        <span class="nav_name">Home</span>
                    </a>
                    <a href="about.php" class="nav_link">
                        <i class='bx bx-user nav_icon' ></i>
                        <span class="nav_name">About Me</span>
                    </a>
                    <a href="scan.php" class="nav_link">
                        <i class='bx bx-loader-circle nav_icon' ></i>
                        <span class="nav_name">Absen Kartu</span>
                    </a>
                    <a href="rekapabsensi.php" class="nav_link">
                        <i class='bx bxs-book-heart nav_icon' ></i>
                        <span class="nav_name">Rekapitulasi Absensi</span>
                    </a>
                    <a href="datasiswa.php" class="nav_link">
                        <i class='bx bxs-folder-open nav_icon' ></i>
                        <span class="nav_name">Data Siswa</span>
                    </a>
                </div>
            </div>

            <div class="nav_logo">
                <i class='bx bxs-face-mask nav_logo_icon light' ></i>
                <span class="nav_logo_name">Welcome, <?php echo $_SESSION['name']; ?>.</span>
            </div>

        </nav>
    </div>
<?php
}

    else{
        header("Location: home.php");
        exit();
    }

?>
