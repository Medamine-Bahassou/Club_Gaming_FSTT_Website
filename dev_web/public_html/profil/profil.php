<?php
session_start();
if (empty($_SESSION)) {
    echo 'your not regestered ! ! ';
} else {
?>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="profil.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <title>Document</title>
    </head>

    <body>
        <!-- <div class=" w-100 p-3  d-flex justify-content-center align-items-center h-100">
            <div class="card d-flex" style="width: 30rem;">
                <?php

                if (!empty($_SESSION['image'])) {
                ?>
                    <img src="<?php echo "../logins/image/" . $_SESSION['image']; ?>" class="card-img-top rounded-circle" alt="...">

                <?php
                } else {
                ?>
                    <img src="<?php echo "user.png"; ?>" class="card-img-top" alt="...">
                <?php
                }
                ?>

                <div class="card-body">
                    <h5 class="card-title">Profil</h5>

                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        Nom : <?php echo $_SESSION['nom'] ?>
                    </li>
                    <li class="list-group-item">
                        Prenom : <?php echo  $_SESSION['prenom'] ?>
                    </li>
                    <li class="list-group-item">
                        email : <?php echo  $_SESSION['email'] ?>
                    </li>
                    <li class="list-group-item">
                        phone : <?php echo  "0" . $_SESSION['tele'] ?>
                    </li>
                </ul>
                <?php
                include '../bdd/utilisateur.php';


                ?>
                <div class="card-body">
                    <a class="btn btn-primary" href="profil_edit.php?id=<?php echo $_SESSION['id'] ?>">Modifier</a>
                </div>
            <?php




        }
            ?>



            </div>
        </div> -->
        <!-- <div class="container">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-10 mt-5 pt-5 ">
                    <div class="row z-depth-3 ">
                        <div class="col-sm-4 bg-dark-subtle  ">
                            <?php

                            if (!empty($_SESSION['image'])) {
                            ?>
                                <img src="<?php echo "../logins/image/" . $_SESSION['image']; ?>" class="card-img-top " alt="...">

                            <?php
                            } else {
                            ?>
                                <img src="<?php echo "user.png"; ?>" class="card-img-top" alt="...">
                            <?php
                            }
                            ?>
                            <div class="card-block text-center text-white position-relative">

                                <i class="fas fa-user-tie fa-7x mt-5"></i>
                                <h2 class="font-weight-bold mt-4 " style="margin-bottom: 70px;"> <?php echo $_SESSION['nom'] . " ";
                                                                                                    echo  $_SESSION['prenom'] ?> </h2>
                                <?php
                                include '../bdd/utilisateur.php';


                                ?>
                                <div class="card-body ">
                                    <a class="btn btn-primary" href="profil_edit.php?id=<?php echo $_SESSION['id'] ?>">Modifier</a>
                                </div>
                                <?php





                                ?>

                                <i class="far fa-edit fa-2x mb-4"></i>

                            </div>

                        </div>
                        <div class="col-sm-8 bg-white">

                            <hr class="bg-dark">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Nom :</p>
                                    <p class="text-muted"><?php echo  $_SESSION['nom'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="font-weight-bold"> prenom </p>
                                    <p class="text-muted"> <?php echo  $_SESSION['prenom'] ?></p>
                                </div>
                            </div>
                            <h3 class="mt-3"> Info </h3>
                            <hr class="badge-dark mt-0 w-250">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Email :</p>
                                    <p class="text-muted"> <?php echo  $_SESSION['email'] ?></p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="font-weight-bold">Tel :</p>
                                    <p class="text-muted"><?php echo  "0" . $_SESSION['tele'] ?></p>
                                </div>
                            </div>

                            <hr class="bg-dark">
                            <i class="fa fa-power-off mt-2 fa-2x"></i>



                        </div>


                    </div>

                </div>

            </div>
        </div> -->
        <div class="container " style="margin-top: 200px;height:60vh">
            <div class="main-body    ">

                <!-- /Breadcrumb -->

                <div class=" row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card" style="height:40vh">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <?php

                                    if (!empty($_SESSION['image'])) {
                                    ?>
                                        <img src="<?php echo "../logins/image/" . $_SESSION['image']; ?>" class="rounded-circle" width="200" alt="..." height="200">

                                    <?php
                                    } else {
                                    ?>
                                        <img src="<?php echo "user.png"; ?>" class="rounded-circle" width="150" alt="...">
                                    <?php
                                    }
                                    ?>

                                    <div class="mt-3">
                                        <h4><?php echo $_SESSION['nom'] . " ";
                                            echo  $_SESSION['prenom'] ?></h4>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body" style="height:40vh">
                                <div class="row" style="height:5vh">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $_SESSION['nom'] . " ";
                                        echo  $_SESSION['prenom'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" style="height:5vh">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo  $_SESSION['email'] ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row" style="height:5vh">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo  "0" . $_SESSION['tele'] ?>
                                    </div>
                                </div>
                                <hr>


                                <div class="row position-absolute bottom-0 start-50 translate-middle-x" style="margin-bottom:30px">
                                    <?php
                                    include '../bdd/utilisateur.php';


                                    ?>
                                    <div class="col-sm-12 ">
                                        <a class="btn btn-info " href="profil_edit.php?id=<?php echo $_SESSION['id'] ?>">Modifier</a>
                                    </div>



                                </div>
                            </div>
                        </div>





                    </div>
                </div>

            </div>
        </div>
    </body>

    </html>