<?php

  // skriver ut App namn
  function appName() {
    return "To-Do";
  }

  // Räknar antalet registerade användare
  function counterUser() {
    global $connection;
    $query = "SELECT id FROM users";
    $result = mysqli_query($connection, $query);
    return $num_users = mysqli_num_rows($result);

  }

  function usernameExists($username) {
    global $connection;
    $query = "SELECT username FROM users WHERE username = '$username' ";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
      return true;
    }
    else {
      return false;
    }
  }

  // Registrerar en användare
    function registerUser() {
      global $connection;
      $username = $_POST['username'];
      $password = $_POST['password'];
      if (usernameExists($username)) {
        return $errorMessage = "Användarnamnet finns redan";
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

  // Loggar in användaren
    function loginuser() {
      $db_username = '';
      $db_password = '';
      global $connection;
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
         $db_profilepic = $row['profilepic'];
      }
      $password = crypt($password, $db_password);
      if ($username === $db_username && $password === $db_password) {
        $_SESSION['id'] = $db_id;
         $_SESSION['username'] = $db_username;
         $_SESSION['profilepic'] = $db_profilepic;
         header("Location: admin.php");
      }
      else {
        return $errorMessage = "Fel användarnamn eller lösenord!";
      }
    }

  function addTask() {
    global $connection;
    if (isset($_POST['taskName'])) {
      $title = $_POST['taskName'];
      $userID = $_SESSION['id'];
      $query = "INSERT INTO tasks(user_id, title)";
      $query .= "VALUES('$userID', '$title')";

      $addTaskQuery = mysqli_query($connection, $query);
      if (!$addTaskQuery) {
        die("Query failed. " . mysqli_error($connection));
      }
    }
    else {
      echo "Wtf?";
    }
  }

  function fixUsernameInTitle() {
    global $title;
    if (isset($_SESSION['username'])) {                      // Kollar om användarnamn är satt
    $username = $_SESSION['username'];                    // Skapar variabeln username och sätter den till $_SESSION['username']
    if (strlen($username) > 0) {                         // Kollar så username är längre än 0 tecken
      if ($username[strlen($username) - 1] !== 's') {   // Kollar så att sista bokstaven i användarnamnet INTE är ett litet s
        $title = $username . 's' . ' uppgifter';       // Gör så att titeln ser ut såhär "Pers uppgifter", med ett s i slutet av användarnamnet
      }
      else {
          $title = $username . ' uppgifter';       // Ifall användarnamnet har ett s i slutet så läggs inte på ett s, t.ex. "Hannes uppgifter"
      }
    }
  }
}
?>
