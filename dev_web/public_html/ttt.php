<?php
// Vérifier si des données ont été envoyées via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du div
    $divData = $_POST["data-input"];
    // Faire quelque chose avec les données...
    echo "Données du div : " . $divData;
}


if(isset($_POST['data-input'])){
    //move_uploaded_file($_POST['data-input'],'profil/'."de.html");
    file_put_contents("profil/de.html",$_POST['data-input']);
}

var_dump($_POST) ; 


?>
