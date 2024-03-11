<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

</head>






<body>
        




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


    <div class="container">
        <h1>Add News</h1>
        <form method="post" enctype="multipart/form-data" action="../admin/admin_functions/news/admin_ajoute_news.php" >
            <br>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="News" name="event">
            </div>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Description" name="description">
            </div>
            <div class="mb-3">
            <label for="formFile" class="form-label">Cover</label>
            <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <input type="submit" value="Valide" class="btn btn-success" name="ajouter">
        </form>

    </div>
    <div id="list-event" class="mt-5 card p-5">
    <h3 class="mb-5 display-4">List of News</h3>
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





  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>