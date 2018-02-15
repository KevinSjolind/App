<?php
  $title = "Välkommen";
  $bodyClass = "d-flex justify-content-center align-items-center";
  include 'includes/head.php';
?>

    <!-- Background video -->
    <video loop muted autoplay>
      <source src="vid/vid.mp4" type="video/mp4">
    Din webbläsare har inte stöd för HTML5 video.
    </video>
    <!-- Background video END -->

    <!-- Main Content -->
    <main class="col-12 col-sm-8  col-lg-4 animated pulse infinite text-center">
      <img src="img/todo.svg" class="img-fluid" alt="ToDo">
      <p>Med <span><?php echo counterUser(); ?></span> använare idag!</p>
      <a href="login.php"> <button type="button" class="btn btn-outline-light">Logga in</button></a>
      <a href="register.php"> <button type="button" class="btn btn-outline-light">Registrera</button></a>
    </main>

<?php include 'includes/footer.php'; ?>
