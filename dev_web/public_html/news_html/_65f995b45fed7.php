<?php $id=3;include_once "../bdd/utilisateur.php";$req = $conn->prepare("SELECT cover FROM news WHERE id= $id");$req->execute();$image = $req->fetchColumn();?><div style="height: 60vh; overflow:hidden; margin-top:100px;" class="center"><img src="../image_news/<?= $image ; ?>" width="100%"></div><?php include "./includes/style.php";include "../navbar/navbar.php";?><div class="container" style="padding-top:50px;" id="news"><h1>fefdf</h1><div>fdhs</div></div>