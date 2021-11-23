<?php 
include("model/Todo.php");

// Delete text
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = TodoModel::getInstance()->deleteTodo($id);
    if ($result) {
        $_SESSION['message'] = 'Todo deleted';
        $_SESSION['message_type'] = 'warning';
        header('Location: ../index.php');
    } 
}

?>
