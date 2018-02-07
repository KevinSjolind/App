<?php
  $bodyClass = "d-flex justify-content-center align-items-center";
  include 'includes/head.php';

  $query = "SELECT id FROM users";
  $result = mysqli_query($connection, $query);
  $num_users = mysqli_num_rows($result);
  ?>

    <!-- Background video -->
    <video loop muted autoplay>
      <source src="vid/vid.mp4" type="video/mp4">
    Your browser does not support the video tag.
    </video>
    <!-- Background video END -->

    <!-- Main Content -->
    <main class="col-12 col-sm-8  col-lg-4 animated pulse infinite text-center">
      <img src="img/todo.svg" class="img-fluid" alt="ToDo">
      <p>Med <span><?php echo $num_users ?></span> använare idag!</p>
      <a href="login.php"> <button type="button" class="btn btn-primary">Logga in</button></a>
      <a href="register.php"> <button type="button" class="btn btn-primary">Registrera</button></a>
    </main>

<?php include 'includes/footer.php'; ?>
