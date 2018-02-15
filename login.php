<?php
        $title = 'Logga in!';
        $bodyClass = "d-flex justify-content-center align-items-center";
        $bodyID = "login";
        include "includes/head.php";
        session_start();



  if (isset($_POST['login'])) {
    loginuser();
    $errorMessage = loginuser();
  }
 ?>

<form class="col-12 col-sm-8 col-lg-3 userforms animated fadeInDownBig" action="login.php" method="post">
  <h3>Logga In</h3>
  <div class="form-group">
    <input type="text" name="username" class="form-control" placeholder="Användarnamn" required autofocus>
  </div>
  <div class="form-group">
    <input type="password" name="password" class="form-control" placeholder="Lösenord" required>
  </div>
  <button type="submit" name="login" class="btn btn-block btn btn-outline-light">Logga in</button>
  <a class="button" href="register.php">Ny användare? Registrera dig här</a>
  <?php if ($errorMessage) : ?>
  <div id="alert"><?php echo $errorMessage; ?></div>
  <?php endif; ?>
</form>

<?php include "includes/footer.php"; ?>
