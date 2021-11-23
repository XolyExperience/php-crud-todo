<?php declare(strict_types = 1) ?>
<?php include 'todos/model/Todo.php'?>
<html lang="en">
<?php include 'partials/head.php' ?>
<body>
  <?php include 'partials/header.php' ?>
  <div class="container mx-auto my-5">
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

    <div class="row">
      <?php include 'todos/view/all.php'?>
    </div>
    <div class="row">
        <form class="row" action="todos/add.php" method="POST">
          <div class="col-md-4 form-group">
            <input type="text" name="text" class="form-control" placeholder="text" autocomplete="off">
          </div>
          <div class="col-md-2">
            <input type="submit" class="btn btn-success btn-block">
          </div>
        </form>
    </div>
    </div>
  </div>
</body>
</html>