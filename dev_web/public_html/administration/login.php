<?php
session_start();
include('includes/header.php');
include '../bdd/utilisateur.php';

if (isset($_POST["login_btn"])) {
  $email = $_POST['email'];
  $password1 = $_POST['password'];

  $query = $conn->prepare("SELECT * FROM admin WHERE email = :email");
  $query->bindParam(':email', $email);
  $query->execute();
  $user = $query->fetch(PDO::FETCH_ASSOC);
  if ($user) {
    if ($password1 == $user['password']) {
      // echo "Login successful. Welcome, " . $user['nom'] . "<br>";
      $_SESSION['nom'] = $user['nom'];
      $_SESSION['prenom'] = $user['prenom'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['password'] = $user['password'];
      header("Location: index.php");
    } else {
      //  echo "Incorrect password <br>";
      $emailerr = "Incorrect password";
    }
  } else {
    $emailerr = "User n'existe pas";
  }
}
?>




<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                  <?php

                  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                    unset($_SESSION['status']);
                  }
                  ?>
                </div>

                <form class="user" action="login.php" method="POST">

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                  </div>

                  <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                  <hr>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>


<?php
include('includes/scripts.php');
?>