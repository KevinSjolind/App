<?php
  $appName = "To-Do";
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

  function checkIfUsernameEndsWithS() {
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
