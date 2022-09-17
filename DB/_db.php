<?php
require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

class _db {

    public function create($name, $content) {
        $name = trim($name, " ");
        $content = trim($content, " ");

        if($name == "" || $content == "") return false;

        $pattern = "/<script>|<\/script>/";

        if(preg_match($pattern, $name) || preg_match($pattern, $content)) return false;
        
        $conn = $this->connect();

        $date = date('Y/m/d h:i:s');

        $query = "INSERT INTO posts (name, content, date) VALUES ('{$name}', '{$content}', '{$date}')";   
    
        $returnvalue = true;
        
        if($conn->query($query) === FALSE) $returnvalue = false;


        $conn->close();

        return $returnvalue;
    }
    public function read() {
        $conn = $this->connect();

        $query = "SELECT * FROM posts";   

        $result = $conn->query($query);

        $conn->close();

        if($result->num_rows < 1) return null;
        
        $data = [];

        while($row = $result->fetch_assoc()) {
            $data[] = $row;
            //array_push($data[count($data) - 1], $row)
        }

        return $data;
    }
    public function update(string $name, string $content, int $id) {
        $name = trim($name, " ");
        $content = trim($content, " ");

        $pattern = "/<script>|<\/script>/";

        if(preg_match($pattern, $name) || preg_match($pattern, $content)) return false;

        $conn = $this->connect();
  
        $query = "UPDATE posts SET name=IF(LENGTH('{$name}')=0, name, '{$name}'), content=IF(LENGTH('{$content}')=0, content, '{$content}') WHERE id={$id}";   
        
        $returnvalue = true;
        
        if($conn->query($query) === FALSE) $returnvalue = false;

        $conn->close();

        return $returnvalue;
    }
    public function delete(int $id) {
        $conn = $this->connect();

        $query = "DELETE FROM posts WHERE id={$id}";   
        
        $returnvalue = true;
        
        if($conn->query($query) === FALSE) $returnvalue = false;

        $conn->close();

        return $returnvalue;
    }

    private function connect() {
        $conn = new mysqli("localhost", $_ENV['USERNAME'], $_ENV['PW'], "crud_php");

        if($conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $conn;
    }
}
?>