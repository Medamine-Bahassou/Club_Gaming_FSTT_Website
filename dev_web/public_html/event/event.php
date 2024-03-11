<?php
    session_start();
?>

<?php



    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=utilisateur", $username, "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully <br>";
    } catch (PDOException $e) {
        echo "Connection failed: <br> " . $e->getMessage();
    }
    $requet = $conn->prepare('SELECT * FROM event');
    $requet->execute();
    $result = $requet->fetchAll(PDO::FETCH_OBJ);
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style_event.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-dark">
    
    <!-- nav bar star  -->
    <nav class="navbar navbar-expand-lg fixed-top row bg-dark" style="padding: 0 15px; margin-bottom: 100px;">
        <div class="container-fluid">
            <a class="navbar-brand me-auto col container" href="#"><img src="../logo/fstgaming.png" width="50px"></a>

            <div class="offcanvas offcanvas-end bg-dark " data-bs-theme="dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img src="../logo/fstgaming.png" width="50px"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body col">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link  text text-white " aria-current="page" href="../home/home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 text text-white " href="../news/news.php">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 text text-white" href="../membres/membre.php">Membre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 text text-white " href="../equipe/equipe.php">Equipe</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2 text text-white active" href="#">Event</a>
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

    <!-- nav bar end -->

    <!-- carousel -->
    <div class="carousel container-fluid" style="margin-top: 60px; height:93vh;">
        <!-- list item -->
        <div class="list" >
            <?php
            foreach ($result as $event) {

            ?>
                <div class="item">
                    <img src="../admin/image/<?php echo $event->image ?>" alt="">
                    <div class="content">
                        <div class="author"><?php echo $event->type ?></div>
                        <div class="title"><?php echo $event->name ?></div>
                        <div class="topic"><?php echo $event->nombre . "VS" . $event->nombre ?></div>
                        <div class="des">
                            <?php echo $event->description ?>

                        </div>
                        <div class="buttons">
                            <button class="rounded-pill">SEE MORE</button>
                            <button class="rounded-pill">SUBSCRIBE</button>
                        </div>
                    </div>
                </div>


            <?php
            }

            ?>
            <!-- <div class="item">
                <img src="LogoVersion_Beta-Key-Art_VALORANT-1.jpg">
                <div class="content">
                    <div class="author">Game</div>
                    <div class="title">Valorant</div>
                    <div class="topic">4vs4</div>
                    <div class="des">
                       
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button class="rounded-pill">SEE MORE</button>
                        <button class="rounded-pill">SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="OIP.jpeg">
                <div class="content">
                    <div class="author">Game</div>
                    <div class="title">FIFA 2023</div>
                    <div class="topic">1 VS 1 </div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="RL1.png">
                <div class="content">
                    <div class="author">Game</div>
                    <div class="title">Rocket league</div>
                    <div class="topic">1 vs 1</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="1600w-QUVVB5lzUWo.webp">
                <div class="content">
                    <div class="author">Game </div>
                    <div class="title">CS GO</div>
                    <div class="topic">4 VS 4</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div> -->
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <?php foreach ($result as $event_thumbnail) { ?>
                <div class="item">
                    <img src="../admin/image/<?php echo $event_thumbnail->image ?>">
                    <div class="content">
                        <div class="title">
                            <?php echo $event_thumbnail->name ?>
                        </div>
                        <div class="description">
                            Description
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- <div class="item">
                <img src="OIP.jpeg">
                <div class="content">
                    <div class="title">
                        FIFA
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="RL1.png">
                <div class="content">
                    <div class="title">
                        Rocket league
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="1600w-QUVVB5lzUWo.webp">
                <div class="content">
                    <div class="title">
                        CS GO
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div> -->
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev">
                < <button id="next">>
            </button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>

    <script src="../scripts/script_event.js"></script>


    <div>
            
        <a href="../admin/admin_event.php" class="button-87" style="width: 200px;">Admin</a>

    </div>
</body>

</html>