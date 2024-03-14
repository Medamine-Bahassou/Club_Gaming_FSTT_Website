<?php

session_start();

include '../bdd/utilisateur.php';


<<<<<<< HEAD
if (isset($_POST["login"])) {
    $email = $_POST['email'];
    $password1 = $_POST['password'];
    if ($email == 'admin@fst.com' && $password1 == 'root') {
        header("Location: ../administration/login.php");
    }

    $query = $conn->prepare("SELECT * FROM user WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($password1 == $user['password']) {
            // echo "Login successful. Welcome, " . $user['nom'] . "<br>";
            $_SESSION['nom'] = $user['nom'];
            $_SESSION['prenom'] = $user['prenom'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['date_naissance'] = $user['date_naissance'];
            $_SESSION['password'] = $user['password'];
            $_SESSION['id'] = $user['id'];

            if (isset($_POST['check'])) {
                setcookie('email', $_SESSION['email'], time() + 10, null, null, false, true);
                setcookie('password', $_SESSION['password'], time() + 10, null, null, false, true);
=======
        if (isset($_POST["login"])) {
            $email = $_POST['email'];
            $password1 = $_POST['password'];
            
            
            $query = $conn->prepare("SELECT * FROM user WHERE email = :email");
            $query->bindParam(':email', $email);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                if ($password1 == $user['password']) {
                    // echo "Login successful. Welcome, " . $user['nom'] . "<br>";
                    $_SESSION['nom'] = $user['nom'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['date_naissance'] = $user['date_naissance'];
                    $_SESSION['password'] = $user['password'];
                    if(isset($_POST['check'])){
                        setcookie('email' , $_SESSION['email'] , time()+10 , null , null , false , true); // 10 seconde 
                        setcookie('password' , $_SESSION['password'] , time()+10 , null , null , false , true); // 10 seconde 
                    }
                    header("Location: ../home/home.php");
                } else {
                    //  echo "Incorrect password <br>";
                    $emailerr = "Incorrect password";
                }
            } else {
                $emailerr = "User n'existe pas";
>>>>>>> 57bb5c689b5d80c3800196978effb5c6826ae508
            }
            header("Location: ../home/home.php");
        } else {
            //  echo "Incorrect password <br>";
            $emailerr = "Incorrect password";
        }
    } else {
        $emailerr = "User n'existe pas";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../logo/fstgaming.png" />
    <style>
        .erro {
            color: #FF0000;
        }
    </style>
</head>



<body style="height: 100vh; background-color:black; background-image:url(../img/cover.jpg);">



    <div class="login">

        <form action="login.php" class="login-form rounded-5" method="post">
            <h1 class="login-title">Login</h1>

            <div class="input-box">
                <i class='bx bxs-user'></i>
                <input type="email" placeholder="Email" name="email" value="<?php if (isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>">

            </div>

            <div class="input-box">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" placeholder="Password" name="password" value="<?php if (isset($_COOKIE['password'])) echo $_COOKIE['password']; ?>">
            </div>
            <p class="erro"><?php echo @$emailerr; ?></p>
            <div class="m-3">
                <input class="me-2" type="checkbox" name="check"><label for="check">Remember me</label>
            </div>

            <button class="login-btn" type="submit" name="login" value="login">Login</button>

            <p class="register">
                Don't have an account?
                <a href="inscription.php">Register</a>
            </p>
        </form>
    </div>

</body>

</html>
