<?php
  session_start();
  $title = 'Välkommen';
  include "includes/head.php";
 ?>

    <h1 class="animated zoomIn welcome">Välkommen, <?php echo $_SESSION['username']; ?></h1>

  </body>
</html>
