
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

        var_dump($_FILES) ; 



        
        if(isset($_POST['data-input'])){
            $html = "news_html/".$_POST['news']."_".uniqid() ; // nom html file 
            //move_uploaded_file($_POST['data-input'],'profil/'."de.html");
            file_put_contents("news_html/".$_POST['news']."_".uniqid(),$_POST['data-input']);
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
