<?php
        $title = 'Logga in!';
        $bodyID = "login";
        include "includes/head.php";
        session_start();

        $db_username = '';
        $db_password = '';

  if (isset($_POST['login'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];

       $username = mysqli_real_escape_string($connection, $username);
       $password = mysqli_real_escape_string($connection, $password);

       $query = "SELECT * FROM users WHERE username = '{$username}' ";
       $select_user_query = mysqli_query($connection, $query);

       if (!$select_user_query) {
         die('query failed') . mysqli_error($connection);
       }

       while ($row = mysqli_fetch_array($select_user_query)) {
          $db_id = $row['id'];
          $db_username = $row['username'];
          $db_password = $row['password'];
       }

       $password = crypt($password, $db_password);

       if ($username === $db_username && $password === $db_password) {
         $_SESSION['id'] = $db_id;
          $_SESSION['username'] = $db_username;
          header("Location: index.php");
       }
       else {

          $errorMessage = "Fel användarnamn eller lösenord!";
       }
  }
 ?>


  <form class="animated fadeInDownBig login " action="login.php" method="post">
    <h3>Logga in</h3>
    <input type="text" name="username" placeholder="Användarnamn" required autofocus>
    <input type="password" name="password" placeholder="Lösenord" required>
    <input class="button" type="submit" name="login" value="Logga in">
    <a class="button" href="register.php">Ny användare? Registrera dig här</a>
    <?php if ($errorMessage) : ?>
    <div id="alert"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
  </form>


</body>
</html>
