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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <title>Document</title>
    </head>

    <body>
        <div class=" w-100 p-3  d-flex justify-content-center align-items-center h-100 d-inline-block">
            <div class="card " style="width: 18rem;">
                <img src="user.png" class="card-img-top" alt="...">
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
        </div>

    </body>

    </html>