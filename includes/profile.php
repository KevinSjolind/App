<header class= "d-flex col-12 align-items-center" id="profileHeader">
  <figure class="">
    <?php if ($_SESSION['profilepic']): ?>
      <img src="img/profilepics/<?php echo $_SESSION['profilepic']; ?>" class="img-fluid" alt="<?php echo $_SESSION['username']; ?>">
      <?php else: ?>
        <i class="fas fa-user-circle"></i>
    <?php endif; ?>
    <h1><?php echo $_SESSION['username']; ?></h1>
  </figure>
</header>
