
<?php
    //bdd
    include '../bdd/utilisateur.php';


    
    // chercher id max
    $requete = $conn->prepare("SELECT COUNT(*) FROM news WHERE id is not null ");
    $requete->execute(); 
    $id = $requete->fetchColumn();
    
    $id++ ;  // id max ++ 
    
    // section image de news 

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
        $image = '../image_news/'.$cover ; 
        //var_dump($_FILES) ; 



        // section des page de news 


        $style = ('<?php $id='.$id.';include_once "../bdd/utilisateur.php";$req = $conn->prepare("SELECT cover FROM news WHERE id= $id");$req->execute();$image = $req->fetchColumn();?><div style="height: 60vh; overflow:hidden; margin-top:100px;" class="center"><img src="../image_news/<?= $image ; ?>" width="100%"></div><?php include "./includes/style.php";include "../navbar/navbar.php";?><div class="container" style="padding-top:50px;" id="news">'); 
        $rec_id = ("<?php $id ?>") ; 


        if(isset($_POST['data-input'])){
            $uniq = uniqid() ; 
            $html = $_POST['news']."_". $uniq; // nom html file 
            //move_uploaded_file($_POST['data-input'],'profil/'."de.html");
            file_put_contents("../news_html/".$_POST['news']."_".$uniq.".php",$style.$_POST['data-input']."</div>");
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>






<body>
    
    
    <div class="list-group" id="list-tab" role="tablist">
        <div class="row px-5">
            <a class="list-group-item list-group-item-action active col-6 rounded" id="list-home-list" data-bs-toggle="list" href="#list-home" role="tab" aria-controls="list-home">Add News</a>
            <a class="list-group-item list-group-item-action col-6 rounded" id="list-profile-list" data-bs-toggle="list" href="#list-profile" role="tab" aria-controls="list-profile">List News</a>
        </div>
    

    </div>
    <div class="">
        <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <!-- add news -->
        <div class="container p-5">
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
            <div id="text-input" contenteditable="true" class="tt container" style="overflow-y: scroll;"></div>

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

        </div>
        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
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

                        $query = $conn->query("SELECT * FROM news")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($query as $news) {
                        ?>
                            <tr>
                                <td><?php echo $news['id'] ?></td>
                                <td><?php echo $news['title'] ?></td>
                                <td><?php echo $news['description'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="news_modifier.php?id=<?php echo $news['id'] ?>">Modifier</a>
                                    <a class="btn btn-danger" href="admin_suprimer_news.php?id=<?php echo $news['id'] ?>">Suprimer</a>
                                </td>
                            </tr>

                        <?php

                        }
                        ?>
                    </tbody>
                </table>
                </div>
        </div>
        </div>
    </div>
    </div>




    

    

</body>
</html>





  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>