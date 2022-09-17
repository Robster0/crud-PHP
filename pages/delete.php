<?php
    include('../DB/_db.php');  
    
    $mysqldb = new _db();        

    $result = $mysqldb->delete((int) $_GET['id']);

    if($result == false) return;
            
    header("Location:./read.php");
?>