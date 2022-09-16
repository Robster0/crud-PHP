<?php

class _db {

    function __constructor() {
        
    }

    function create($name, $content) {
        $conn = $this->connect();

        $date = date('Y/m/d h:i:s');

        $query = "INSERT INTO posts (name, content, date) VALUES ('{$name}', '{$content}', '{$date}')";   

        if($conn->query($query) === FALSE) {
            echo "INSERTION (PENETRATION) DIDN'T WORK";
        }
 
 
        $conn->close();
    }
    function read() {
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
    function update(int $id) {
        $conn = $this->connect();

        $query = "UPDATE posts SET name, content WHERE id={$id}";   

        $result = $conn->query($query);

        $conn->close();

        if($result->num_rows < 1) return null;

        return true;
    }
    function delete() {
        $conn = $this->connect();



        $conn->close();
    }

    function connect() {
        $conn = new mysqli("localhost", $_ENV['USERNAME'], $_ENV['PW'], "crud_php");

        if($conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        return $conn;
    }
}


?>