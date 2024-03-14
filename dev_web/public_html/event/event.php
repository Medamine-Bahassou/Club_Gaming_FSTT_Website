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


    
    <!-- carousel -->
    <div class="carousel container-fluid" style=" height:100vh; margin:0;">
    <?php
        include '../navbar/navbar.php';
    ?>
        <!-- list item -->
        <div class="list">
            <?php
            foreach ($result as $event) {

            ?>
                <div class="item">
                    <img src="../image_event/<?php echo $event->image ?>" alt="">
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
                    <img src="../image_event/<?php echo $event_thumbnail->image ?>">
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
    <script src="./script_event.js"></script>

</body>

</html>