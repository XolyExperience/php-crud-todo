<?php 
include 'model/Todo.php';
$id = $_GET['id'];
$todo = TodoModel::getInstance()->getTodo($id);
?>

<html lang="en">
<?php include '../partials/head.php' ?>
<body>
<?php include '../partials/header.php'?>
<div class="container p-4">
    <div class="row text-center my-2">
        <h1>Edit Todo</h1>
    </div>
    <div class="row">
        <form class="row justify-content-center" action="./edit.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id?>"/>
          <div class="col-md-4 form-group">
            <input type="text" name="text" class="form-control" autocomplete="off" placeholder="text" value="<?php echo $todo['text']?>" />
          </div>
          <div class="col-md-1 justify-content-center">
            <input type="submit" class="btn btn-success" value="Update"/> 
          </div>
        </form>
    </div>
</div>
</body>
</html>

