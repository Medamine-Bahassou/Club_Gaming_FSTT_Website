<?php
include './includes/condition_login.php'; 


include '../bdd/utilisateur.php';

$sqlState = $conn->prepare('SELECT * FROM news WHERE id=?');
$id = @$_GET['id'];
$sqlState->execute([$id]);
$query = $sqlState->fetch(PDO::FETCH_ASSOC);
$html = @$query['html'];
$path_html = "../news_html/".$html.".php" ; 
$content = file_get_contents($path_html);
//
var_dump($path_html);




//
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST['data-input'])){

        $style = ('<?php $id='.$id.';include_once "../bdd/utilisateur.php";$req = $conn->prepare("SELECT cover FROM news WHERE id= $id");$req->execute();$image = $req->fetchColumn();?><div style="height: 60vh; overflow:hidden; margin-top:100px;" class="center"><img src="../image_news/<?= $image ; ?>" width="100%"></div><?php include "./includes/style.php";include "../navbar/navbar.php";?><div class="container" style="padding-top:50px;" id="news">'); 
        file_put_contents($path_html , $style.$_POST['data-input']."</div>");
    
    }
    var_dump($_POST) ; 
    if(isset($_POST['news']) || isset($_POST['description'])){
        $title = $_POST['news'];
        $description = $_POST['description'];
        $date_pub = date("Y/m/d"); 

        $requete = $conn->prepare('UPDATE news 
            SET title=?, description=?, date_pub=?
            WHERE id=?');
        $requete->execute([$title, $description, $date_pub, $id]);
    }
    header("Location: News.php"); 
}

?>


<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<div id="content" style="display: none;">
    <?php echo $content ;  ?>
</div>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="style.css" rel="stylesheet">
</head>
<body >
    <form id="form" method="post" enctype="multipart/form-data"  class="container" >
        <div class="container">
            <br>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="News" name="news" value="<?= @$query['title'] ?>">
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="Description" name="description" value="<?= @$query['description'] ?>">
            </div>

            <?php include 'create_html.php' ;  ?>
            <!-- form -->
            <div id="text-input" contenteditable="true" class="tt container" style="overflow-y: scroll;">
            
            

            </div>
            
            <input type="hidden" name="data-input" id="data-input" >
            
            <script>
                var content = document.getElementById('content').innerHTML; 
                var res = document.getElementById('news').innerHTML; 
                document.getElementById('text-input').innerHTML =  res; 
            </script>


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


        </div>
    </form>

    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>
