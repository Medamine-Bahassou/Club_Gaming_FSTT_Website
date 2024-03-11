<?php

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=admin", $username, "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully <br>";
} catch (PDOException $e) {
    echo "Connection failed: <br> " . $e->getMessage();
}
$id = $_GET['id'];
$i = $id ; 
$requete = $conn->prepare('DELETE FROM event1 WHERE id=?');
$suprimer = $requete->execute([$id]);
if ($suprimer){

    // TODO : order the id 
    header('location: admin_ajoute_news.php');
}
else
    echo "non";

