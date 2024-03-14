
<?php
    
    $servername = "localhost";
    $username = "root";
    $password = "root";

    //conn au bdd 
    try {
        $conn = new PDO("mysql:host=$servername;dbname=utilisateur", $username, "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully <br>";
    } catch (PDOException $e) {
        echo "Connection failed: <br> " . $e->getMessage();
    }


    
    // chercher id max
    $requete = $conn->prepare("SELECT COUNT(*) FROM news WHERE id is not null ");
    $requete->execute(); 
    $id = $requete->fetchColumn();
    
    $id++ ;  // id max ++ 
    
    if(isset($_POST['news']) && isset($_POST['description'])){

        $news = @$_POST['news']; 
        $description = @$_POST['description']; 
        $date_pub = date("y/m/d") ; 
        $cover = "" ;
        if(isset($_FILES['image'])){
            $image = $_FILES['image']['name'] ; 
            $cover = uniqid() . $image ; // file name + unique id 
            move_uploaded_file($_FILES['image']['tmp_name'],'../image_news/'.$cover);
        }

        //var_dump($_FILES) ; 



        
        if(isset($_POST['data-input'])){
            $uniq = uniqid() ; 
            $html = $_POST['news']."_". $uniq; // nom html file 
            //move_uploaded_file($_POST['data-input'],'profil/'."de.html");
            file_put_contents("news_html/".$_POST['news']."_".$uniq.".php",$_POST['data-input']);
        }

        var_dump($_POST) ; 

        //insertion des champs 
        $requete = $conn->prepare("INSERT INTO news (id,title, description,date_pub, cover,html) VALUES (:id, :title, :description,:date_pub , :cover, :html)");
        
        $requete->bindParam(':id', $id);
        $requete->bindParam(':title', $news);
        $requete->bindParam(':description', $description);
        $requete->bindParam(':date_pub', $date_pub);
        $requete->bindParam(':cover', $cover);
        $requete->bindParam(':html', $html);
        $requete->execute(); 

    }


?>


<?php
// // Vérifier si des données ont été envoyées via POST
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Récupérer les données du div
//     $divData = $_POST["data-input"];
//     // Faire quelque chose avec les données...
//     echo "Données du div : " . $divData;
// }




?>


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
        




    <div class="container">
        <h1>Add News</h1>
        <form id="form" method="post" enctype="multipart/form-data" action="News.php" >
            <br>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="News" name="news">
            </div>
            <div class="form-floating mb-3">
            <input type="text" class="form-control" placeholder="Description" name="description">
            </div>


            <?php include 'create_html.php' ;  ?>
            <!-- form -->
            <div id="text-input" contenteditable="true" class="tt"></div>


            <input type="hidden" name="data-input" id="data-input" >



            <div class="mb-3">
            <label for="formFile" class="form-label">Cover</label>
            <input class="form-control" type="file" id="formFile" name="image">
            </div>
            <input type="submit" value="Valide" class="btn btn-success" name="ajouter" id="submit-btn">

            <script>
                // Submit form with HTML content
                document.getElementById("submit-btn").addEventListener("click", function(event) {
                // Prevent default form behavior
                event.preventDefault();

                // Get the content of the div
                var divContent = document.getElementById("text-input").innerHTML;

                // Update the value of the hidden input
                document.getElementById("data-input").value = divContent;

                // Submit the form
                document.getElementById("form").submit();
                });
            </script>
            <script src="./script.js"></script>

        </form>

    </div>

    <!-- list of news -->
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
           
            $query = $conn->query("SELECT * FROM news")->fetchAll(PDO::FETCH_ASSOC);;
            foreach ($query as $news) {
            ?>
                <tr>
                    <td><?php echo $news['id'] ?></td>
                    <td><?php echo $news['title'] ?></td>
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