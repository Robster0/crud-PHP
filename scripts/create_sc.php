<?php
include('../DB/_db.php');

$mysqldb = new _db();


$result = $mysqldb->create($_POST['name'], $_POST['content']);

if(!$result) return header("Location:../pages/error.php");

header("Location:../pages/read.php");
?>