<?php $id=2;include_once "../bdd/utilisateur.php";$req = $conn->prepare("SELECT cover FROM news WHERE id= $id");$req->execute();$image = $req->fetchColumn();?><div style="height: 60vh; overflow:hidden; margin-top:100px;" class="center"><img src="../image_news/<?= $image ; ?>" width="100%"></div><?php include "./includes/style.php";include "../navbar/navbar.php";?><div class="container" style="padding-top:50px;" id="news"><h1>adaedeada</h1><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div>deda</div></blockquote><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><blockquote style="margin: 0 0 0 40px; border: none; padding: 0px;"><div><sup>ded</sup></div></blockquote></blockquote></div>