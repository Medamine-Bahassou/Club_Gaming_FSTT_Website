<?php
    session_start();
    if(empty($_SESSION)){
        echo 'your not regestered ! ! ' ; 
    }
    else{
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Profil</h1>
    <h3>nom et prenom : </h3> <?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?>
    <h3>date de naissance : </h3> <?php echo $_SESSION['date_naissance']; ?>
    <h3>email : </h3> <?php echo $_SESSION['email']; ?>
    <h3>password : </h3> <?php echo $_SESSION['password']; ?>
</body>
</html>

<?php 
    }
?>