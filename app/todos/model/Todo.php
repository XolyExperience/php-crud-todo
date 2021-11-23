<?php
class DBConnection {
    private $db;
    static private $instance = null;

    private function __construct() {
        $this->connection = new mysqli("mysql","glimuser", "glimpass", 'glimdb');
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        // Check connection
        if ($this->connection -> connect_errno) {
          echo "Failed to connect to MySQL: " . $this->db -> connect_error;
          exit();
        }
    }

     // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new DBConnection();
        }
    
        return self::$instance->connection;
    }
}


class TodoModel {
    private $db; 
    private string $tableName;
    private static $instance = null;

    private function __construct() {
        $this->db = DBConnection::getInstance();
        $this->tableName = 'todos';
    }

     // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new TodoModel();
        }
    
        return self::$instance;
    }


    public function addTodo($text) 
    {
        $query = "INSERT INTO '$this->tableName' (text) VALUES ('$text')";
        $result = $this->db->query($query);
        return $result;
    }

    public function deleteTodo($id) 
    {
        $query = "DELETE FROM $this->tableName WHERE `id`=$id";
        $result = $this->db->query($query);
        return $result;
    }

    public function updateTodo($id, $todo) 
    {
        if (!isset($id)) {
            echo "id was not set ${id}";
        }
        $text = $todo['text'];
        if (!isset($text)) {
            echo "text was not set". $text;
        }
    
        $isDone = $todo['isDone'];
        if (!isset($isDone)) {
            echo "isDone was not set". $isDone;
        }
    
        $query = "UPDATE `$this->tableName` SET `text`='$text',`isDone`='$isDone' WHERE `$this->tableName`.`id`=$id";
        $result = $this->db->query($query);
        return $result; 
    }

    public function getTodo($id) 
    {
        if (!isset($id)) {
            echo "id was not set ${id}";
        }
        $query = "SELECT * FROM $this->tableName WHERE `id`=$id";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function getAllTodos() 
    {
        $query = "SELECT * FROM $this->tableName";
        $result = $this->db->query($query);
        $rows = array();
        while($row = $result->fetch_assoc())
        {
            $rows[] = $row;
        }
        return $rows;
    }
}

