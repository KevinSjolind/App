<?php
  session_start();
  $title = 'Välkommen';
  include "includes/head.php";

  if (isset($_POST['addTask'])) {
    addTask();
  }
 ?>



<?php if (isset($_SESSION['username'])) : ?>
  <nav>
    <a href="logout.php">Logga ut <?php echo $_SESSION['username']; ?></a>
    <h1>App</h1>
  </nav>

  <section>
    <h2>Att göra:</h2>
    <ul>
      <?php
        getTask();


?>
    </ul>
    <form action="index.php" method="post">
      <input type="text" name="taskName">
      <input type="submit" name="addTask" value="Lägg till">
    </form>
  </section>
  <?php else : ?>
    <h1>FA BORT!</h1>
<?php endif; ?>


  </body>
</html>
