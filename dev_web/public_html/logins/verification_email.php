<?php
include '../bdd/utilisateur.php';
if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $query = $conn->prepare("SELECT * FROM user WHERE email = :email AND verification_code =:verification_code");
    $query->bindParam(':email', $_GET['email']);
    $query->bindParam(':verification_code', $_GET['v_code']);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user) {
        if ($user['is_verified'] == 0) {
            $v = 1;
            $upadate = $conn->prepare("UPDATE user SET is_verified=? WHERE email = ? ");
            $upadate->execute([$v, $user['email']]);
            header("Location: login.php");
        } else {
            echo "<script> alert('already registred') </script>";
        }
    }
}
