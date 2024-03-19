<?php
include('includes/header.php');
include('includes/navbar.php');
include '../bdd/utilisateur.php';
$i = 0;
$j = 0;
$genererr = "";
$emailexit = "";
$passerr = "";
$admin = $conn->prepare("SELECT * FROM admin ");
$admin->execute();
$admins = $admin->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST["registerbtn"])) {
  $nom = $_POST['username'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $password1 = $_POST['password'];
  $password2 = $_POST['confirmpassword'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //echo "Invalid email";
    $emailerr = "Invalid email";
  }

  if ($password1 !== $password2) {
    //echo "Passwords do not match";
    $passerr = "Passwords do not match";
    exit;
  } else {



    $emailexit = ""; // Initialize $emailexit

    $email_check = $conn->prepare("SELECT COUNT(*) FROM admin WHERE email = :email");
    $email_check->bindParam(':email', $email);
    $email_check->execute();
    $count = $email_check->fetchColumn();
    if ($count > 0) {
      $emailexit = "Email  exists";
    } else {

      //hash password
      //$hashed_password = password_hash($password1, PASSWORD_DEFAULT);
      $requete = $conn->prepare("INSERT INTO admin (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :password)");
      $requete->bindParam(':nom', $nom);
      $requete->bindParam(':prenom', $prenom);
      $requete->bindParam(':email', $email);
      $requete->bindParam(':password', $password1);

      try {
        $requete->execute();
        $i++;
        //echo "User inserted successfully.";

      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
    }
  }
}

?>

<!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" method="get" action="register.php">
  <div class="input-group">
    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" name="searchInput">
    <div class="input-group-append">
      <button class="btn btn-primary" type="submit" name="search">
        <i class="fas fa-search fa-sm"></i>
      </button>
    </div>
  </div>
</form> -->

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="register.php" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> nom </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label> prenom </label>
            <input type="text" name="prenom" class="form-control" placeholder="Enter Username">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Admin Profile
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
          Add Admin Profile
        </button>
      </h6>
    </div>

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Full Name </th>
              <th>Email </th>
              <th>Password</th>
              <th>EDIT </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>

            <?php

            if (isset($_GET['search']) && isset($_GET['searchInput']) && !empty($_GET['searchInput'])) {
              $recherche = htmlspecialchars($_GET['searchInput']);
              $searchPattern = "%$recherche%";
              $search = $conn->prepare('SELECT * FROM admin WHERE nom LIKE :recherche OR prenom LIKE :recherche');
              $search->bindParam(':recherche', $searchPattern, PDO::PARAM_STR);
              $search->execute();
              $searchResults = $search->fetchAll(PDO::FETCH_ASSOC);
              foreach ($searchResults as $value) {
            ?>
                <tr>
                  <td> <?php echo $value['id'] ?> </td>
                  <td><?php echo $value['nom'] . " " . $value['prenom'] ?></td>
                  <td><?php echo $value['email'] ?> </td>
                  <td type="password"> <?php echo $value['password'] ?> </td>
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="edit_id" value="">
                      <a class="btn btn-success" href="modification_admin_list.php?id=<?php echo $value['id'] ?>">EDIT</a>
                    </form>
                  </td>
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="delete_id" value="">
                      <a class="btn btn-danger" href="suprimer_admin_list.php?id=<?php echo $value['id'] ?>">DELETE</a>

                    </form>
                  </td>
                </tr>
              <?php
              }
            } else {
              foreach ($admins as $value) {
              ?>
                <tr>
                  <td> <?php echo $value['id'] ?> </td>
                  <td><?php echo $value['nom'] . " " . $value['prenom'] ?></td>
                  <td><?php echo $value['email'] ?> </td>
                  <td type="password"> <?php echo $value['password'] ?> </td>
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="edit_id" value="">
                      <a class="btn btn-success" href="modification_admin_list.php?id=<?php echo $value['id'] ?>">EDIT</a>
                    </form>
                  </td>
                  <td>
                    <form action="" method="post">
                      <input type="hidden" name="delete_id" value="">
                      <a class="btn btn-danger" href="suprimer_admin_list.php?id=<?php echo $value['id'] ?>">DELETE</a>

                    </form>
                  </td>
                </tr>
            <?php
              }
            }

            ?>


          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>