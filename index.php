<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="images/LogoUBJ.png">
    <title>Sikadu UNBAJA | Login</title>
</head>

<body style="background-color: #146788;">

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light" style="border-radius: 1rem;">
                        <div class="card-body pt-1 pb-0 text-center">
                            <div class="mb-md-1 mt-md-4 pb-5">

                                <h2>LOGIN</h2>
                                <p class="mb-5">Please enter your login and password!</p </div>

                                <form action="Login/Login.php" method="POST">
                                    <?php if (isset($_GET['pesan'])) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Login Gagal!!</strong> <?= $_GET['pesan'] ?>
                                        </div>
                                    <?php } ?>

                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label font-weight-bold" for="typeEmailX">Username</label>
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg border border-dark" name="frmUsername" />
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <label class="form-label font-weight-bold" for="typePasswordX">Password</label>
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg border border-dark" name="frmPassword" />
                                    </div>

                                    <button class="btn btn-outline-dark btn-lg px-5 mt-4" name="btnLogin" type="submit">Login</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>