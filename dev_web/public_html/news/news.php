<html lang="en">
<head>
    <title>News </title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="../logo/fstgaming.png" />


    
</head>
<body class="bg-dark text text-white">


    <?php
        $servername = "localhost";
        $username = "root";
        $password = "root";
    // conn bdd
      try {
          $conn = new PDO("mysql:host=$servername;dbname=admin", $username, "");
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          // echo "Connected successfully <br>";
      } catch (PDOException $e) {
          echo "Connection failed: <br> " . $e->getMessage();
      }



    
    
    ?>








          <?php
            include '../navbar/navbar.php';
          ?>


          <?php
      
          try {
            $conn = new PDO("mysql:host=$servername;dbname=admin", "root", "");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
          } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
          }
          
          $requete = $conn->prepare("SELECT COUNT(*) FROM event1");
          $requete->execute(); 
          $count = $requete->fetchColumn(); 
          $requete = $conn->prepare("SELECT cover FROM event1 WHERE id=$count") ; 
          $requete->execute();
          $img1= $requete->fetchColumn();
          $requete = $conn->prepare("SELECT cover FROM event1 WHERE id=$count-1") ; 
          $requete->execute();
          $img2= $requete->fetchColumn();
          $requete = $conn->prepare("SELECT cover FROM event1 WHERE id=$count-2") ; 
          $requete->execute();
          $img3= $requete->fetchColumn();







      ?>




      <div class="bg-dark">
        <div class="blur">
        <div class="titre" style="margin-top: 100px;">new</div>

            <!-- contenue de slide  -->
            
            <div id="slides" style="min-height: 100vh; width:100%; padding-top: 100px;">
                <div id="carouselExampleCaptions" class="carousel slide mw-100" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      
                    
                      <div class="carousel-item active">
                        <div class="d-flex justify-content-center align-item-center">
                            
                            <img src="<?php echo "../upload/" . $img1 ;  ?>" class="d-block w-25" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                      </div>
                      <div class="carousel-item ">
                        <div class="d-flex justify-content-center align-item-center">
                            
                            <img src="<?php echo "../upload/" . $img2;  ?>" class="d-block w-25">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                      </div>
                      <div class="carousel-item ">
                        <div class="d-flex justify-content-center align-item-center">
                            
                            <img src="<?php echo "../upload/" . $img3 ;  ?>" class="d-block w-25">
                            <div class="carousel-caption d-none d-md-block">
                              <h5>First slide label</h5>
                              <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                      </div>
                     
                      </div>
                    </div>
                    
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
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

                $news = $conn->prepare("SELECT COUNT(*) FROM event1");
                $news->execute();
                $news_count = $news->fetchColumn();


                for($i=1;$i<=10;$i++){
                  while($news_count){
                echo '
                <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">
                ';

                
                
                          
                          $requete = $conn->prepare("SELECT event1 FROM event1 WHERE id=$news_count") ;     
                          $requete->execute(); 
                          $ev = $requete->fetchColumn();
                          echo $ev ; 
                          
                        
                        echo '
                        </h5>
                          <small class="text-body-secondary">3 days ago</small>
                        </div>
                        <p class="mb-1">Some placeholder content in a paragraph.</p>
                        <small class="text-body-secondary">And some muted small print.</small>
                      </a>
                        ';
                        $news_count-- ; 
                      }}
                        
                        ?>
                    


            </div>



        </div>
      </div>





    </body>
</html>