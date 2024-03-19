<?php
include './includes/condition_login.php'; 
session_start();
include '../bdd/utilisateur.php';
$sqlState = $conn->prepare('SELECT * FROM admin WHERE id=?');
$id = @$_GET['id'];
$sqlState->execute([$id]);
$admin = $sqlState->fetch(PDO::FETCH_ASSOC);
if (isset($_POST["submit"])) {
    $prenom = $_POST['prenom'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    // Corrected variable name
    // $img = $_POST['img']; // You might want to handle image upload separately

    if (!empty($prenom) && !empty($name) && !empty($email)) {
        $requete = $conn->prepare('UPDATE admin 
        SET prenom=?, nom=?, email=?
            WHERE id=?'); // Removed extra comma
        $_SESSION['nom'] = $name;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $email;
        $requete->execute([$prenom, $name, $email,  $id]);

        header('location: register.php');
    } else {
        echo "error";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>admin</title>
</head>

<body>
    <form method="post" enctype="multipart/form-data" class="p-5 g-3">


        <div class="row m-2">
            <label for="inputEmail4" class="form-label col-2">Nom</label>
            <input name="name" type="text" class="form-control col-10" id="inputEmail4 " value="<?php echo @$admin['nom'] ?>">
        </div>
        <div class="row m-2">
            <label for="inputEmail4" class="form-label col-2">ID</label>
            <input readonly name="id" type="text" class="form-control col-10" id="inputEmail4 " value="<?php echo @$admin['id'] ?>">
        </div>
        <div class="row m-2">
            <label for="inputEmail4" class="form-label col-2">Prenom</label>
            <input name="prenom" type="text" class="form-control col-10" id="inputEmail4 " value="<?php echo @$admin['prenom'] ?>">
        </div>
        <div class="row m-2">
            <label for="inputEmail4" class="form-label col-2">email</label>
            <input name="email" type="email" class="form-control col-10" id="inputEmail4 " value="<?php echo @$admin['email'] ?>">
        </div>

        <input type="submit" name="submit" value="modifier" class="btn btn-success w-25 ml-3">
    </form>
</body>

</html>