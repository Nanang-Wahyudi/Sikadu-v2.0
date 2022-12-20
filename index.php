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

<body style="background-color: lightgray;">

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body pt-2 pb-2 text-center">
                            <div class="mb-md-3 mt-md-4 pb-5">

                                <h2>LOGIN</h2>
                                <p class="text-white-50 mb-5">Please enter your login and password!</p </div>

                                <form action="Login/Login.php" method="POST">
                                    <?php if (isset($_GET['pesan'])) { ?>
                                        <div class="alert alert-warning" role="alert">
                                            <strong>Login Gagal!!</strong> <?= $_GET['pesan'] ?>
                                        </div>
                                    <?php } ?>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg" name="frmUsername" />
                                        <label class="form-label" for="typeEmailX">Username</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg" name="frmPassword" />
                                        <label class="form-label" for="typePasswordX">Password</label>
                                    </div>

                                    <button class="btn btn-outline-light btn-lg px-5" name="btnLogin" type="submit">Login</button>
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