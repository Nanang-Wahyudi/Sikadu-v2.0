<!doctype html>
<html lang="en">

<head>
    <title>Sikadu UNBAJA | User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/LogoUBJ.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" style="background-color: #146788;">
            <div class="p-4 pt-5">
                <div class="foto">
                    <a href="#" class="img logo" style="background-image: url(../images/LogoUBJ.png);">
                    </a>
                </div>
                <div class="keterangan pb-4 pt-1 text-center">
                    <h5 class="text-white">Universitas Banten Jaya</h5>
                    <span>Kota Serang, Banten</span>
                </div>
                <hr class="border-white pb-4">

                <ul class="list-unstyled components mb-5" style="font-weight: 400;">
                    <li>
                        <a href="?halaman=home"><i class="fa-solid fa-house me-2"></i>&emsp;Home</a>
                    </li>
                    <li>
                        <a href="?halaman=mahasiswa"><i class="fa-solid fa-user-graduate">
                            </i>&emsp;&nbsp;Mahasiswa</a>
                    </li>
                    <li>
                        <a href="?halaman=dosen"><i class="fa-solid fa-chalkboard-user">
                            </i>&emsp;Dosen</a>
                    </li>
                    <li>
                        <a href="?halaman=matkul"><i class="fa-solid fa-book"></i>&emsp;&nbsp;Mata
                            Kuliah</a>
                    </li>
                    <li>
                        <a href="?halaman=kbm"><i class="fa-solid fa-person-chalkboard">
                            </i>&emsp;Kegiatan Belajar Mengajar</a>
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

                    <h6 class="text-text-center">Selamat Datang User</h6>
                    <form class="d-flex" role="logout">
                        <a href="../index.php" class="btn btn-outline-danger" data-toogle="tooltip" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </form>
                </div>
            </nav>

            <!-- <div class="row">
                <div class="col-md-7">
                    <h4 class="mb-4">Sikadu v2.0</h4>
                </div>
                <div class="col-md-5">
                    <form class="d-flex" role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <hr> -->

            <?php include 'Config.php'; ?>

        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
</body>

</html>