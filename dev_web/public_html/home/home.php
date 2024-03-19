<html lang="en">
  <style>
/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: lightyellow;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: lightblue;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: lightseagreen;
}



  </style>

<head>
  <title>Club Gaming </title>
  <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="shortcut icon" href="../logo/fstgaming.png" />
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <!-- font 2 -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Orbitron:wght@400..900&display=swap" rel="stylesheet">
  <!-- font pixel -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Orbitron:wght@400..900&family=Silkscreen:wght@400;700&display=swap" rel="stylesheet">


</head>

<body class="bg-dark text text-white ">



  <?php
  include '../navbar/navbar.php';
  ?>
  <!-- contenue de home  -->



  <div class="background">
    <div class="blur">




      <div class="container row tel" style="min-height: 100vh;">
        <div class="home col-md-8 mb-5">
          <h1 class="text text-warning pixel display-1 typing-demo">AFSTET</h1>
          <p>L'AFSTEJ est une association étudiante créée au sein de la Faculté des Sciences et Technique des Jeux Electroniques de l'Université Abdelmalek Essaâdi de Tanger</p>
          <div class="d-flex ">
            <a class="button-87 rounded-pill" href="#Contact">Contact</a>
            <a class="button-87 rounded-pill" href="#About">About</a>
          </div>
        </div>

        <div class="col-md-4 item-logo d-flex justify-content-center" style="display: flex; justify-content:center; align-items:center;">
          <img src="../logo/fstgaming.png" width="300px" id="im">
        </div>
      </div>
      <div id="About" class="section-about w-100" style="min-height: 100vh; ">
        <div class="container">
          <h1 class="ten title">About</h1>
          <div class="row">
            <!-- txt -->
            <div class="col-md-6 d-flex justify-content-center align-items-center h-100 mt-5 mb-5 box">
              <div class="card bg-transparent mx-5 rounded-5 border border-light d-flex justify-content-center align-items-center">
                <div class="card-body d-inline-block ">
                  <h5 class="card-title text text-warning display-5 pixel">AFSTET</h5>
                  <p class="card-text text text-white active"> L'AFSTEJ est dirigée par une équipe d'étudiants bénévoles élus par leurs pairs.
                    Elle dispose d'un local dédié au sein de la faculté, où les membres peuvent se réunir,
                    travailler sur des projets et participer à des activités sociales.</p>
                  <h5 class="card-title text text-warning display-8 pixel hide " style="display:none;">Objectif</h5>
                  <p class="card-text text text-white hide " style="display:none;"> -- >L'AFSTEJ est dirigée par une équipe d'étudiants bénévoles élus par leurs pairs.
                    Elle dispose d'un local dédié au sein de la faculté, où les membres peuvent se réunir,
                    travailler sur des projets et participer à des activités sociales.</p>
                  <p class="card-text text text-white hide" style="display:none;">-- > L'AFSTEJ est dirigée par une équipe d'étudiants bénévoles élus par leurs pairs.
                    Elle dispose d'un local dédié au sein de la faculté, où les membres peuvent se réunir,
                    travailler sur des projets et participer à des activités sociales.</p>
                  <p class="card-text text text-white hide  " style="display:none;">-- > L'AFSTEJ est dirigée par une équipe d'étudiants bénévoles élus par leurs pairs.
                    Elle dispose d'un local dédié au sein de la faculté, où les membres peuvent se réunir,
                    travailler sur des projets et participer à des activités sociales.</p>
                  <h5 class="card-title text text-warning display-8 pixel hide" style="display:none;">Date de creation</h5>
                  <p class="card-text text text-white hide" style="display:none;"> 2024/22/10</p>
                </div>
                <button class="button-87 mb-4 w-75 rounded-pill activeBtn" style="bottom: 0;">Show more</button> 
                <button class="button-87 mb-4 w-75 rounded-pill hideBtn" style="bottom: 0;display:none ;">>Hide</button>

              </div>

            </div>
            <!-- img -->
            <div class="col-md-6 center">
              <img class="image" src="about.png" width="90%">
            </div>
          </div>
        </div>
      </div>



      <!--  -->
      <div class="container-fluid" style="min-height: 100vh; background-image:linear-gradient(#244a95 50%,#000000);">

        <div class="container">
          <h1 class="ten title mb-5">News</h1>

          <!-- list group -->
          <div class="row">
            <div class="col-md-6 mb-5 ">
              <div class="list-group rounded-5 ">
              <?php
                include '../bdd/utilisateur.php';

                $news = $conn->prepare("SELECT COUNT(*) FROM news");
                $news->execute();
                $news_count = $news->fetchColumn();
                $j = $news_count ; 
                $i = 0 ; 
                  while($j && $i<6){
                    $requete = $conn->prepare("SELECT * FROM news WHERE id=$j") ;     
                    $requete->execute(); 
                    $data = $requete->fetch(PDO::FETCH_ASSOC);

                    ?>
                <a href="../news_html/<?php echo $data['html'].".php"  ;?> " class="list-group-item list-group-item-action p-3">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">
                
                <?php
                echo $data['title'] ; 
                          
                ?>

                </h5>
                  <small class="text-body-secondary"><?php echo $data['date_pub'] ;?></small>
                </div>
                <p class="mb-1"><?php echo $data['description'] ;?></p>
                <small class="text-body-secondary">And some muted small print.</small>
              </a>
                
                
              <?php 
                $j-- ; $i++;
              }
                
                ?>
              </div>
              <!--  fin list group-->
              
              <?php 
                    if($news_count > 6 ){
                      echo '<a href="../news/news.php" class="button-87 rounded-pill w-50">Show more..</a>'; 
                    }  
              ?>

            </div>
            <!--  -->



            <?php
          
                      $requete = $conn->prepare("SELECT COUNT(*) FROM news");
                      $requete->execute(); 
                      $count = $requete->fetchColumn(); 
                      $requete = $conn->prepare("SELECT * FROM news WHERE id=$count") ; 
                      $requete->execute();
                      $img1= $requete->fetch(PDO::FETCH_ASSOC);
                      $requete = $conn->prepare("SELECT * FROM news WHERE id=$count-1") ; 
                      $requete->execute();
                      $img2= $requete->fetch(PDO::FETCH_ASSOC);
                      $requete = $conn->prepare("SELECT * FROM news WHERE id=$count-2") ; 
                      $requete->execute();
                      $img3= $requete->fetch(PDO::FETCH_ASSOC);
            
            
            ?>




            <!-- slide -->
            <div class="col-md-6">
              <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators ">
                <?php if($img1 != null) { ?>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <?php } ?>
                     
                      <?php if($img2 != null) { ?>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <?php } ?>
                     
                      <?php if($img3 != null) { ?>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                      <?php } ?>
                </div>
                <div class="carousel-inner bg-dark  shadow  mb-5 rounded-5" style="height:500px;">
                <?php if($img1 != null) { ?>
                      <div class="carousel-item active">
                        <a href="../news_html/<?php echo $img1['html'].".php"  ;?> ">
                          <div class="d-flex justify-content-center align-item-center h-100">
                              <div style="height: 100%; overflow:hidden; " class="center w-100">
                              <img src="<?php echo "../image_news/" . $img1['cover'] ;  ?>" class="d-block  h-100">
                              </div>
                              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px black; background-color: rgba(59, 59, 59, 0.425); box-shadow: 0 0 20px 20px rgba(59, 59, 59, 0.425) ;">
                                <h5 ><?php echo $img1['title'] ;?></h5>
                                <p><?php echo $img1['description'] ;?></p>
                              </div>
                          </div>
                        </a>
                      </div>
                      <?php } ?>
                    <?php if($img2 != null) { ?>
                      <div class="carousel-item ">
                        <a href="../news_html/<?php echo $img2['html'].".php"  ;?> ">
                          <div class="d-flex justify-content-center align-item-center h-100">
                            <div style="height:  100%; overflow:hidden;" class="center w-100">
                              <img src="<?php echo "../image_news/" . $img2['cover'];  ?>" class="d-block h-100">
                            </div>
                              <div class="carousel-caption d-none d-md-block mw-100" style="text-shadow: 2px 2px black; background-color: rgba(59, 59, 59, 0.425); box-shadow: 0 0 20px 20px rgba(59, 59, 59, 0.425) ;">
                                <h5><?php echo $img2['title'] ;?></h5>
                                <p><?php echo $img2['description'] ;?></p>
                              </div>
                          </div>
                        </a>
                      </div>
                      <?php } ?>
                    <?php if($img3 != null) { ?>
                      
                      <div class="carousel-item ">
                        <a href="../news_html/<?php echo $img3['html'].".php"  ;?> ">

                          <div class="d-flex justify-content-center align-item-center h-100">
                            <div style="height:  100%; overflow:hidden;" class="center w-100">
                              <img src="<?php echo "../image_news/" . $img3['cover'] ;  ?>" class="d-block h-100" >
                            </div>
                              <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px black; background-color: rgba(59, 59, 59, 0.425); box-shadow: 0 0 20px 20px rgba(59, 59, 59, 0.425) ;">
                                <h5 ><?php echo $img3['title'] ;?></h5>
                                <p><?php echo $img3['description'] ;?></p>
                              </div>
                          </div>
                        </a>
                      </div>
                </div>
                <?php } ?>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>

            </div>
            <!-- fin slide -->
          </div>
        </div>
      </div>
      </div>


      <div style="width:100%; background-color :black; ">
        <div class="blur">
          <div id="Contact" class="section w-100 container">
            <h1 class="d-flex justify-content-center text text-warning title">Contact</h1>
            <div class="mb-3 ">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="email" class="form-control rounded-5" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Message</label>
              <textarea class="form-control rounded-5 p-4" id="exampleFormControlTextarea1" rows="10" placeholder="I want to express my gratitude ..."></textarea>
            </div>
            <div class="mb-3">
              <input type="submit" class="button-87 rounded-pill">
            </div>
          </div>
        </div>
      </div>








    </div>
  </div>




  <script src="script.js"></script>
  <script src="script_home.js"></script>
</body>

</html>