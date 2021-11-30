<?php
include("model/Todo.php");

if (isset($_POST['text'])) {
  $text = $_POST['text'];

  $result = TodoModel::getInstance()->addTodo($text);
  if ($result) {
      $_SESSION['message'] = 'Todo added';
      $_SESSION['message_type'] = 'warning';
      header('Location: ../index.php');
  } 
}

?>