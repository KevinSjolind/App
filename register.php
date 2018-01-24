<?php
        $title = 'Registrera';
        $bodyID = "register";
        include "includes/head.php";
        session_start();

  if (isset($_POST['register'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];


       if (usernameExists($username)) {
         echo "Användarnamnet finns redan";
       }
       else {

         $username = mysqli_real_escape_string($connection, $username);
         $password = mysqli_real_escape_string($connection, $password);
         // Password encryption
         $hashFormat = "$2y$10$";
         $salt = "a9UK8VBd3R8dW78AjKUWjc";
         $hashAndSalt = $hashFormat . $salt;
         $password = crypt($password, $hashAndSalt);

         // SQL QUERY
         $query = "INSERT INTO users(username, password) ";
         $query .= "VALUES ('$username', '$password')";

         // Confirmation
         $result = mysqli_query($connection, $query);
         if (!$result) {
           die("Query failed") . mysqli_error($connection);
         }

         header("Location: login.php");
       }
  }
 ?>


  <form class="animated fadeInDownBig login " action="register.php" method="post">
    <h3>Registrera</h3>
    <input type="text" name="username" placeholder="Användarnamn" required autofocus>
    <input type="password" name="password" placeholder="Lösenord" required>
    <input class="button" type="submit" name="register" value="Registrera">
  </form>

</body>
</html>
