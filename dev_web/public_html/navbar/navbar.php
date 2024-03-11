<?php
  session_start(); //session
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/fstgaming.png" />


</head>
<body class="bg-dark">
    

<!-- debut navbar -->
<nav class="navbar navbar-expand-lg fixed-top row" style="margin: 0px 15px; backdrop-filter:blur(10px);">
        <div class="container-fluid">
          <a class="navbar-brand me-auto col container" href="../home/home.php"><img src="../logo/fstgaming.png" width="50px"></a>
          
          <div class="offcanvas offcanvas-end bg-dark" style="height: 100vh;right:-15px;" data-bs-theme="dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="../logo/fstgaming.png" width="50px"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body col">
              <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link text text-white " aria-current="page" href="../home/home.php#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2 text text-white " href="../news/news.php#">News</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-2 text text-white" href="../membres/membre.php#">Membre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mx-lg-2 text text-white " href="../equipe/equipe.php#">Equipe</a>
              </li>
              <li class="nav-item">
                    <a class="nav-link mx-lg-2 text text-white" href="../event/event.php#">Event</a>
                </li>                  
                
              </ul>
             
            </div>
          </div>
          <?php
            if(empty($_SESSION)){
              ?>
                  <div class="col-md-auto">
                  <a href="../logins/login.php" class="login-button">Login</a>
                
                  <a href="../logins/inscription.php " class="login-button me-3">Inscription</a>
                </div>
              
            <?php
            }else{
              ?>

              
              <div class="col-md-auto text text-white"> 
              
            <div class=" col-md-autotext text-white ms-2">
            <a href="../profil/profil.php" class="button-87 rounded-pill">Profil</a>
            </div>
               
            </div>
            <div class="col-md-auto text text-white ms-2">
            <a href="../logins/deconnexion.php" class="button-87 rounded-pill">Deconnect</a>
            </div>
            
               
              
            
          <?php } ?>

          
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-theme="dark" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      <!-- fin navbar -->
      <script src="../scripts/script_event.js"></script>

    </body>
</html>