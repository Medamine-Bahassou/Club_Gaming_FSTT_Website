<?php include_once "../../bdd/utilisateur.php";$req = $conn->prepare("SELECT cover FROM news WHERE id= $id  ");$req->execute();$image = $req->fetchColumn();?>
<div style="height: 60vh; overflow:hidden; margin-top:100px;" class="center">
<img src="../../image_news/<? $image ; ?>" width="100%"></div>
