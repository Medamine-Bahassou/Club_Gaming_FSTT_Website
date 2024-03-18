<?php
session_start();
include '../bdd/utilisateur.php';

$sqlState = $conn->prepare('SELECT * FROM event WHERE id=?');
$id_event = @$_GET['id_event'];
$sqlState->execute([$id_event]);
$event = $sqlState->fetch(PDO::FETCH_ASSOC);
$id_membre = $_SESSION['id'];
$nom = $_SESSION['nom'];
// Initialize $emailexit

$exit = $conn->prepare("SELECT COUNT(*) FROM participer WHERE id_event=:id_event AND id_player=:id_player");
$exit->bindParam(':id_event', $id_event);
$exit->bindParam(':id_player', $id_membre);
$exit->execute();
$count = $exit->fetchColumn();
if ($count > 0) {
    $message = "vous avez deja particper à cet evenement ";
    echo "<script>window.onload = function() { alert('$message'); window.location.href = 'event.php';}</script>";
} else {
    $requete = $conn->prepare('INSERT INTO participer(id_event,id_player,event_name,player_name) VALUES(:id_event,:id_player,:event_name,:player_name) ');
    $requete->bindParam(':id_event', $id_event);
    $requete->bindParam(':id_player', $id_membre);
    $requete->bindParam(':event_name', $event['name']);
    $requete->bindParam(':player_name', $nom);
    $vrai = $requete->execute();
    if ($vrai)
        header('location: event.php');
    else
        echo "non";
}
