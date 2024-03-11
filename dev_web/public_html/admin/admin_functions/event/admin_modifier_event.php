<?php

    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=utilisateur", $username, "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully <br>";
    } catch (PDOException $e) {
        echo "Connection failed: <br> " . $e->getMessage();
    }
    $sqlState = $conn->prepare('SELECT * FROM event WHERE id=?');
    $id = @$_GET['id'];
    $sqlState->execute([$id]);
    $event = $sqlState->fetch(PDO::FETCH_ASSOC);
    if (isset($_POST["submit"])) {
        $type = $_POST['type'];
        $name = $_POST['name'];
        $nombre = $_POST['nombre'];
        $description = $_POST['discription']; // Corrected variable name
        // $img = $_POST['img']; // You might want to handle image upload separately

        if (!empty($type) && !empty($name) && !empty($nombre) && !empty($description)) {
            $requete = $conn->prepare('UPDATE event 
            SET type=?, name=?, nombre=?, description=?
            WHERE id=?'); // Removed extra comma
            $requete->execute([$type, $name, $nombre, $description, $id]);
            header('location:admin.php');
        }
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <link rel="stylesheet" href="../../../bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    
<!-- debut navbar  -->
<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top ">
      <div class="container-fluid ">
        <a class="navbar-brand " href="#"><img src="../../../logo/fstgaming.png" width="50px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../../admin.php">Dashboard</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="./admin_functions/news/admin_ajoute_news.php">News</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="./admin_event.php">Event</a>
            </li>
           
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        
        </div>
    </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- fin navbar -->
    <form method="post" enctype="multipart/from-data" class="row g-3">


        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">type</label>
            <input name="type" type="text" class="form-control" id="inputEmail4 " value="<?php echo @$event['type'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">id</label>
            <input readonly name="id" type="text" class="form-control" id="inputEmail4 " value="<?php echo @$event['id'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">name</label>
            <input name="name" type="text" class="form-control" id="inputEmail4 " value="<?php echo @$event['name'] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">nombr de jours</label>
            <input name="nombre" type="text" class="form-control" id="inputEmail4 " value="<?php echo @$event['nombre'] ?>">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">discription</label>
            <textarea name="discription" class="form-control" id="exampleFormControlTextarea1" rows="3"> <?php echo @$event['description'] ?></textarea>

        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">image</label>
            <input name="img" class="form-control" type="file" id="formFile">

        </div>
        <input type="submit" name="submit" value="modifier" btn btn-primary my-2>
    </form>

</body>

</html>