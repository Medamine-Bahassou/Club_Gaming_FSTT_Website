<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="../../../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="https://icones.pro/wp-content/uploads/2022/07/symbole-administrateur-bleu.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
            <a class="nav-link " href="#">News</a>
            </li>
            <li class="nav-item">
            <a class="nav-link " href="../event/admin_event.php">Event</a>
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





<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";

    //conn au bdd 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=admin", $username, "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully <br>";
    } catch (PDOException $e) {
        echo "Connection failed: <br> " . $e->getMessage();
    }


    
    // chercher id max
    $requete = $conn->prepare("SELECT COUNT(*) FROM event1 WHERE id is not null ");
    $requete->execute(); 
    $id = $requete->fetchColumn();
    
    $id++ ;  // id max ++ 
    

    if(isset($_POST['event']) && isset($_POST['description'])){

        $event = @$_POST['event']; 
        $description = @$_POST['description']; 
        
        $cover = "" ;
        if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'] ; 
            $cover = uniqid() . $image ; // file name + unique id 
            move_uploaded_file($_FILES['image']['tmp_name'],'./image/'.$cover);
        }

        var_dump($_FILES) ; 


        //insertion des champs 
        $requete = $conn->prepare("INSERT INTO event1 (id,event1, description, cover) VALUES (:id, :event1, :description, :cover)");
        
        $requete->bindParam(':id', $id);
        $requete->bindParam(':event1', $event);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':cover', $cover);
        $requete->execute(); 

    }


?>


    <div class="container" style="padding-top : 100px;">
        <form method="post" enctype="multipart/form-data" action="admin_ajoute_news.php" >
            <h1>Add Event</h1>
            <br>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Event" name="event">
            <label for="floatingInput">Event</label>
            </div>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="Description" name="description">
            <label for="floatingInput">Description</label>
            </div>
            <div class="mb-3">
            <label for="formFile" class="form-label">Cover</label>
            <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <input type="submit" value="Valide" class="btn btn-success" name="ajouter">
        </form>

    </div>
    <div id="list-event" class="mt-5 card p-5">
    <h3 class="mb-5 display-4">List of events</h3>
    <table class="table table-striped table-hover border">
        <thead>
            <tr>
                <th>Id</th>
                <th>News</th>
                <th>Options</th>

            </tr>
        </thead>
        <tbody>
            <?php
           
            $query = $conn->query("SELECT * FROM event1")->fetchAll(PDO::FETCH_ASSOC);;
            foreach ($query as $news) {
            ?>
                <tr>
                    <td><?php echo $news['id'] ?></td>
                    <td><?php echo $news['event1'] ?></td>
                    <td><?php echo $news['description'] ?></td>
                    <td>
                        <a class="btn bnt-primary" href="admin_modifier_event.php?id=<?php echo $news['id'] ?>">Modifier</a>
                        <a class="btn bnt-danger" href="admin_suprimer_news.php?id=<?php echo $news['id'] ?>">Suprimer</a>

                    </td>
                </tr>

            <?php

            }
            ?>
        </tbody>
    </table>
    </div>

</body>
</html>