<!doctype html>
<html lang="en">

<head>
    <title>Sikadu UNBAJA | Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/LogoUBJ.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="p-4 pt-5">
                <a href="#" class="img logo mb-5" style="background-image: url(../images/LogoUBJ.png);"></a>
                <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="?halaman=home"><i class="fa-solid fa-house me-2"></i>&emsp;Home</a>
                    </li>
                    <li>
                        <a href="?halaman=mahasiswa"><i class="fa-solid fa-user-graduate"></i>&emsp;&nbsp;Mahasiswa</a>
                    </li>
                    <li>
                        <a href="?halaman=dosen"><i class="fa-solid fa-chalkboard-user"></i>&emsp;Dosen</a>
                    </li>
                    <li>
                        <a href="?halaman=fakultas"><i class="fa-solid fa-building-columns"></i>&emsp;&nbsp;Fakultas</a>
                    </li>
                    <li>
                        <a href="?halaman=prodi"><i class="fa-solid fa-school"></i>&emsp;Program Studi</a>
                    </li>
                    <li>
                        <a href="?halaman=matkul"><i class="fa-solid fa-book"></i>&emsp;&nbsp;Mata Kuliah</a>
                    </li>
                    <li>
                        <a href="?halaman=kbm"><i class="fa-solid fa-person-chalkboard"></i>&emsp;Kegiatan Belajar Mengajar</a>
                    </li>
                </ul>

                <div class="footer">
                    <p>
                        Copyright &copy; <?= date("Y") ?>
                        | Informasi <br>
                        by <span style="color: #ffc107;">Kelompok I</span>
                    </p>
                </div>

            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fa fa-bars"></i>
                        <span class="sr-only">Toggle Menu</span>
                    </button>

                    <h6 class="text-text-center">Selamat Datang Admin</h6>
                    <form class="d-flex" role="logout">
                        <a href="../index.php" class="btn btn-outline-danger" data-toogle="tooltip" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </form>
                </div>
            </nav>

            <h3 class="mb-4">Sikadu v2.0</h3>
            <hr>
            <?php include 'Config.php'; ?>


        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>