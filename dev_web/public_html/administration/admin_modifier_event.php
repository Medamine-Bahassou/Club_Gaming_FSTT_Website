<?php
include '../bdd/utilisateur.php';
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
    $image = "";
    if (isset($_FILES['image'])) {
        $image = $_FILES['image']['name'];
        $fileName = uniqid() . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], './image/' . $fileName);
    }
    if (!empty($type) && !empty($name) && !empty($nombre) && !empty($description) && !empty($fileName)) {
        $requete = $conn->prepare('UPDATE event 
            SET type=?, name=?, nombre=?, description=?,image=?
            WHERE id=?'); // Removed extra comma
        $requete->execute([$type, $name, $nombre, $description, $fileName, $id]);
        header('location: Event.php');
    } else {
        header('location: index.php');
    }
}
?>


<?php
include('includes/header.php');
include('includes/navbar.php');
?>



<form method="post" enctype="multipart/form-data" class="p-5 g-3">


    <div class="row m-2">
        <label for="inputEmail4" class="form-label col-2">Type</label>
        <input name="type" type="text" class="form-control col-10" id="inputEmail4 " value="<?php echo @$event['type'] ?>">
    </div>
    <div class="row m-2">
        <label for="inputEmail4" class="form-label col-2">ID</label>
        <input readonly name="id" type="text" class="form-control col-10" id="inputEmail4 " value="<?php echo @$event['id'] ?>">
    </div>
    <div class="row m-2">
        <label for="inputEmail4" class="form-label col-2">Name</label>
        <input name="name" type="text" class="form-control col-10" id="inputEmail4 " value="<?php echo @$event['name'] ?>">
    </div>
    <div class="row m-2">
        <label for="inputEmail4" class="form-label col-2">Number of Players</label>
        <input name="nombre" type="text" class="form-control col-10" id="inputEmail4 " value="<?php echo @$event['nombre'] ?>">
    </div>
    <div class="row m-2 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label col-2">Description</label>
        <textarea name="discription" class="form-control col-10" id="exampleFormControlTextarea1" row m-2s="3"> <?php echo @$event['description'] ?></textarea>

    </div>
    <div class="row m-2 mb-3">
        <label for="formFile" class="form-label col-2">Image</label>
        <input name="image" class="form-control col-10" type="file" id="formFile">

    </div>
    <input type="submit" name="submit" value="modifier" class="btn btn-success w-25 ml-3">
</form>




<?php
$currentDir = __DIR__;

include('includes/scripts.php');
include('includes/footer.php');
?>