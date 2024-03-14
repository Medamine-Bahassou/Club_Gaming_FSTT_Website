<?php



include '../bdd/utilisateur.php';


$i = 0;
$j = 0;
$genererr = "";
$emailexit = "";
$passerr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ok"])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date'];
    $genre = isset($_POST['genre']) ? $_POST['genre'] : '';
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $tele = $_POST["tele"];

    $image = "";
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $fileName = uniqid() . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $fileName);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //echo "Invalid email";
        $emailerr = "Invalid email";
    }

    if ($password1 !== $password2) {
        //echo "Passwords do not match";
        $passerr = "Passwords do not match";
    }

    if (empty($genre)) {
        // echo "Please select your gender";
        $genererr = "Please select your gender";
    }
    $emailexit = ""; // Initialize $emailexit

    $email_check = $conn->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
    $email_check->bindParam(':email', $email);
    $email_check->execute();
    $count = $email_check->fetchColumn();
    if ($count > 0) {
        $emailexit = "Email  exists";
    } else {

        //hash password
        //$hashed_password = password_hash($password1, PASSWORD_DEFAULT);
        if (!empty($image)) {
            $requete = $conn->prepare("INSERT INTO user (nom, prenom, email, password, date_naissance, genre,tele,image) VALUES (:nom, :prenom, :email, :password, :date_naissance, :genre,:tele,:image)");
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':password', $password1);
            $requete->bindParam(':date_naissance', $date_naissance);
            $requete->bindParam(':genre', $genre);
            $requete->bindParam(':tele', $tele);
            $requete->bindParam(':image', $fileName);
        } else {
            $requete = $conn->prepare("INSERT INTO user (nom, prenom, email, password, date_naissance, genre,tele) VALUES (:nom, :prenom, :email, :password, :date_naissance, :genre,:tele)");
            $requete->bindParam(':nom', $nom);
            $requete->bindParam(':prenom', $prenom);
            $requete->bindParam(':email', $email);
            $requete->bindParam(':password', $password1);
            $requete->bindParam(':date_naissance', $date_naissance);
            $requete->bindParam(':genre', $genre);
            $requete->bindParam(':tele', $tele);
        }


        try {
            $requete->execute();
            $i++;
            //echo "User inserted successfully.";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        if ($i == 1) {
            header("Location: login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../logo/fstgaming.png" />


</head>


<body style="background-color:black; background-image:url(../img/cover.jpg);">



    <div class="inscription">

        <form action="inscription.php" method="post" class="register-form" enctype="multipart/form-data">
            <h1 class="login-title">Register</h1>


            <div class="user-name">
                <div class="input-box">
                    <input type="text" placeholder="Votre Nom" id="name" name="nom" required>
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Votre prenom" id="prenom" name="prenom" required>
                </div>
            </div>

            <div class="date input-box">
                <label>Votre date de naissance</label>
                <input type="date" placeholder="Votre date de naissance" id="date" name="date" class=" rounded-pill">
            </div>

            <div>
                <label class="genre" for="">genre</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genre" id="masculin" value="masculin">
                    <label class="form-check-label">Masculin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="genre" id="feminin" value="feminin">
                    <label class="form-check-label">Feminin</label>
                </div>
                <span class="erorr"><?php echo @$genererr; ?></span>
            </div>

            <div class="contact">
                <div class="input-box">

                    <input type="email" placeholder="Votre email" id="email" name="email" required>

                </div> <span class="text text-danger"> <?php echo @$emailexit; ?></span>
                <div class="input-box">
                    <input type="tel" placeholder=" Votre telephone" id="tele" name="tele" pattern="[0-9]{10}">
                </div>
            </div>

            <div class="password">
                <div class="input-box">
                    <input type="password" placeholder="Votre mot de passe" id="password1" name="password1" required>
                    <span></span>
                </div>
                <div class="input-box">
                    <input type="password" placeholder=" confirmer Votre mot de passe" id="password2" name="password2" required>

                </div>
                <span class="text text-danger"><?php echo @$passerr; ?></span>
            </div>
            <div class="mb-3 input-box">
                <label for="formFile" class="form-label" style="font-weight: bold;">Image</label>
                <input name="image" class="form-control rounded-pill" type="file" id="formFile">

            </div>
            <button class="login-btn" type="submit" name="ok" value="ok">inscrit</button>
        </form>


    </div>

</body>

</html>