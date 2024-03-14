<html lang="en">
<head>
    <title>News </title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/fstgaming.png" />


    
</head>
<body class="bg-dark text text-white">









          <!-- navbar -->
          <?php
            include '../navbar/navbar.php';
          ?>


          <?php
          //bdd
          include '../bdd/utilisateur.php';
          
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




      <div class="bg-dark" style="background-image: url(../img/background.jpg);">
      <div style="backdrop-filter: blur(10px);">
        <div class="bg-blur">
        <!-- <div class="titre" style="margin-top: 100px;">news</div> -->

            <!-- contenue de slide  -->
            
            <div id="slides" style="width:100%; padding-top: 100px;">
                <div id="carouselExampleCaptions" class="carousel slide mw-100" data-bs-ride="carousel" >
                    <div class="carousel-indicators">
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
                    <div class="carousel-inner">
                      
                    <?php if($img1 != null) { ?>
                      <div class="carousel-item active">
                        <div class="d-flex justify-content-center align-item-center">
                            <div style="height: 60vh; overflow:hidden;" class="center w-100">
                            <img src="<?php echo "../image_news/" . $img1['cover'] ;  ?>" class="d-block w-100">
                            </div>
                            <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px black; background-color: rgba(59, 59, 59, 0.425); box-shadow: 0 0 20px 20px rgba(59, 59, 59, 0.425) ;">
                              <h5><?php echo $img1['title'] ;?></h5>
                              <p><?php echo $img1['description'] ;?></p>
                            </div>
                        </div>
                      </div>
                      <?php } ?>
                    <?php if($img2 != null) { ?>
                      <div class="carousel-item ">
                        <div class="d-flex justify-content-center align-item-center">
                          <div style="height: 60vh; overflow:hidden;" class="center w-100">
                            <img src="<?php echo "../image_news/" . $img2['cover'];  ?>" class="d-block w-100">
                          </div>
                            <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px black; background-color: rgba(59, 59, 59, 0.425); box-shadow: 0 0 20px 20px rgba(59, 59, 59, 0.425) ;">
                              <h5><?php echo $img2['title'] ;?></h5>
                              <p><?php echo $img2['description'] ;?></p>
                            </div>
                        </div>
                      </div>
                      <?php } ?>
                    <?php if($img3 != null) { ?>

                      <div class="carousel-item ">
                        <div class="d-flex justify-content-center align-item-center">
                          <div style="height: 60vh; overflow:hidden;" class="center w-100">
                            <img src="<?php echo "../image_news/" . $img3['cover'] ;  ?>" class="d-block w-100">
                          </div>
                            <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px black; background-color: rgba(59, 59, 59, 0.425); box-shadow: 0 0 20px 20px rgba(59, 59, 59, 0.425) ;">
                              <h5><?php echo $img3['title'] ;?></h5>
                              <p><?php echo $img3['description'] ;?></p>
                            </div>
                        </div>
                      </div>
                     
                      </div>
                    </div>
                    <?php } ?>
                    
                    <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" style="height: 60vh; margin-top:100px ;">
                      <span class="carousel-control-prev-icon" aria-hidden="true" ></span>
                      <span class="visually-hidden" >Previous</span>
                    </button>
                    <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" style="height: 60vh; margin-top:100px ;">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <!-- fin de slide -->

            <div id="news" class="w-75 container" style="min-height: 100vh; padding-top:100px;">
                <h1>News</h1>
                <div class="list-group">

                <?php

                $news = $conn->prepare("SELECT COUNT(*) FROM news WHERE id is not null");
                $news->execute();
                $news_count = $news->fetchColumn();
                for($i=1;$i<=6;$i++){
                  while($news_count){
                    $requete = $conn->prepare("SELECT * FROM news WHERE id=$news_count") ;     
                    $requete->execute(); 
                    $data = $requete->fetch(PDO::FETCH_ASSOC);
              
                    ?>
                <a href="../news_html/<?php echo $data['html'].".php"  ;?> " class="list-group-item list-group-item-action">
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
                        $news_count-- ; 
                      }}
                        
                        ?>
                    


            </div>



        </div>
        </div>
      </div>





    </body>
</html>