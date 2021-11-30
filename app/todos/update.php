<?php
include('model/Todo.php');

// Mark as done
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $todo = TodoModel::getInstance()->getTodo($id);
    $todo['isDone'] = $todo['isDone'] == 1 ? 0: 1;
    $result = TodoModel::getInstance()->updateTodo($id, $todo);
    if ($result) {
        $_SESSION['message'] = 'Todo checked';
        $_SESSION['message_type'] = 'success';
        header('Location:http://localhost:8080/index.php');
    } 
}

// Update text
if  (isset($_POST['id'])) {
    $id = $_POST['id'];
    $text = $_POST['text'];
    $todo = TodoModel::getInstance()->getTodo($id);
    $todo['text'] = $text;
    $result = TodoModel::getInstance()->updateTodo($id, $todo);
    if ($result) {
        $_SESSION['message'] = 'Todo updated';
        $_SESSION['message_type'] = 'success';
        header('Location:http://localhost:8080/index.php');
    } 
}
?>