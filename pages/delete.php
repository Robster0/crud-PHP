<?php

require '../vendor/autoload.php';
       include('../DB/_db.php');  
       $dotenv = Dotenv\Dotenv::createImmutable('../');
       $dotenv->load();
       
       $mysqldb = new _db();

       $result = $mysqldb->delete((int) $_GET['id']);

       if($result == false) return;

       header("Location:./read.php");
?>