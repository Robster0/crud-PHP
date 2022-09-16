<?php
include('../DB/_db.php');

$mysqldb = new _db();

$result = $mysqldb->update($_POST['name'], $_POST['content'], $_POST['id']);

if(!$result) return header("Location:../pages/error.php");

header("Location:../pages/read.php");
?>