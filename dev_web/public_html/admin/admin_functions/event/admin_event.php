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
    if (isset($_POST['submit'])) {
        $type = $_POST['type'];
        $name = $_POST['name'];
        $nombre = $_POST['nombre'];
        $description = $_POST['discription']; // Corrected variable name
        // $img = $_POST['img']; // You might want to handle image upload separately 
        $image = "";
        if (isset($_FILES['image'])) {
            $image = $_FILES['image']['name'];
            $fileName = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], './image/' . $fileName);
        }



        if (!empty($type) && !empty($name) && !empty($nombre) && !empty($description)) {


            $requete = $conn->prepare("INSERT INTO event (type, name, nombre, description,image) VALUES (:type, :name, :nombre, :description,:image)"); // Removed extra comma
            $requete->bindParam(':type', $type);
            $requete->bindParam(':name', $name);
            $requete->bindParam(':nombre', $nombre);
            $requete->bindParam(':description', $description); // Corrected variable name
            $requete->bindParam(':image', $fileName); // 
            try {
                $requete->execute();
                echo "Data inserted successfully."; // Changed the message for clarity

            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            echo "All fields are required.";
        }
    }

    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
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
            <a class="nav-link " href="../news/admin_ajoute_news.php">News</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="#">Event</a>
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

<div class="container" style="padding-top: 120px;">
    <!-- debut form -->
    <form method="post" enctype="multipart/form-data" class="row g-3">
    <br>
        <label for="formFile" class="form-label" style="font-weight: bold;">Data</label>     
        <div class="form-floating mb-3 col-md-6">
            <input type="text" class="form-control" id="floatingInput" placeholder="Type" name="type">
            <label for="floatingInput" class="form-label ms-2">Type</label>
        </div>
        <div class="form-floating mb-3 col-md-6">
            <input name="name" type="text" class="form-control" placeholder="Name" id="floatingInput">
            <label for="floatingInput" class="form-label ms-2">Name</label>

        </div>
        <div class="form-floating mb-3 col-md-6">
            <input name="nombre" type="text" class="form-control" placeholder="Type" id="floatingInput">
            <label for="floatingInput" class="form-label ms-2">Nomber of days</label>
        </div>
        <label style="font-weight: bold;">Description</label>     
        <div class="mb-3">
            <textarea name="discription" class="form-control" placeholder="The first Event of the faculty of science ..." id="exampleFormControlTextarea1" rows="3"></textarea>

        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label" style="font-weight: bold;">Image</label>     
            <input name="image" class="form-control" type="file" id="formFile">

        </div>
        <input type="submit" name="submit" value="Valider" class="btn btn-success w-25 mx-2">

    </form>

    <!-- fin form -->

    <div id="list-event" class="mt-5 card p-5">
    <h3 class="mb-5 display-4">List of events</h3>
    <table class="table table-striped table-hover border">
        <thead>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Name</th>
                <th>Nomber of days</th>
                <th>Options</th>

            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $conn = new PDO("mysql:host=$servername;dbname=utilisateur", $username, "");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully <br>";
            } catch (PDOException $e) {
                echo "Connection failed: <br> " . $e->getMessage();
            }

            $query = $conn->query("SELECT * FROM event")->fetchAll(PDO::FETCH_ASSOC);;
            foreach ($query as $event) {
            ?>
                <tr>
                    <td><?php echo $event['id'] ?></td>
                    <td><?php echo $event['type'] ?></td>
                    <td><?php echo $event['name'] ?></td>
                    <td><?php echo $event['nombre'] ?></td>
                    <td>
                        <a class="btn bnt-primary" href="admin_modifier_event.php?id=<?php echo $event['id'] ?>">Modifier</a>
                        <a class="btn bnt-danger" href="admin_suprimer_event.php?id=<?php echo $event['id'] ?>">Suprimer</a>

                    </td>
                </tr>

            <?php

            }
            ?>
        </tbody>
    </table>
    </div>
</div>
</body>

</html>