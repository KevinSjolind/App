<?php
  session_start();
  include "includes/head.php";
  checkIfUsernameEndsWithS();

  if (isset($_POST['addTask'])) {
    addTask();
  }
 ?>

<?php if (isset($_SESSION['username'])) : ?>

<?php include "includes/navigation.php"; ?>

<div class="container-fluid">
  <div class="row justify-content-center">
    <?php include "includes/tasks.php"; ?>
  </div>
</div>

  <?php else : ?>
    <h1>FA BORT!</h1>
<?php endif; ?>


<?php include "includes/footer.php"; ?>
