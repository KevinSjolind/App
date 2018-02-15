<?php
  $bodyClass = "d-flex justify-content-center align-items-center";
        $title = 'Registrera';
        $bodyID = "register";
        include "includes/head.php";
        session_start();

  if (isset($_POST['register'])) {
    registerUser();
    $errorMessage = registerUser();
  }
 ?>

  <form class="col-12 col-sm-8 col-lg-3 userforms animated fadeInDownBig" action="register.php" method="post">
    <h3>Registrera</h3>
    <div class="form-group">
      <input type="text" name="username" class="form-control" placeholder="Användarnamn" required autofocus>
    </div>
    <div class="form-group">
      <input type="password" name="password" class="form-control" placeholder="Lösenord" required>
    </div>
    <button type="submit" name="register" class="btn btn-block btn btn-outline-light">Registrera</button>
    <a class="button" href="login.php">Har du redan ett konto? LOGGA IN!!</a>
    <?php if ($errorMessage) : ?>
    <div id="alert"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
  </form>

<?php include "includes/footer.php"; ?>
