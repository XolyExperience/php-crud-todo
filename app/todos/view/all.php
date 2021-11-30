<table class="table">
      <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">text</th>
        <th scope="col">is done</th>
        <th scope="col">operations</th>
      </tr>
      </thead>
      <tbody>

        <?php 
          foreach (TodoModel::getInstance()->getAllTodos() as $todo) {
            $id =$todo['id']; 
            $text =$todo['text']; 
            $isDone =$todo['isDone'];
            $isDoneBtnStyle = ($isDone ? 'btn-warning' : 'btn-success');
            $isDoneBtnText = ($isDone ? 'Undo' : 'Done');
            echo "<tr>
                    <td>$todo[id]</td>
                    <td>$todo[text]</td>
                    <td>$todo[isDone]</td>
                    <td>
                      <a href='/todos/update.php?id=$id' class='btn $isDoneBtnStyle'>$isDoneBtnText</a>
                      <a href='/todos/view/update.php?id=$id' class='btn btn-primary'>Update</a>
                      <a href='/todos/delete.php?id=$id' class='btn btn-danger'>Delete</a>
                    </td>
                  </tr>";
          }
        ?>
      </tbody>
    </table>