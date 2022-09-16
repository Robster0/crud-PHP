<?php
declare(strict_types=1);
require __DIR__ . '/vendor/autoload.php';
include('DB/_db.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



$mysqldb = new _db();

//$mysqldb->create("Walter", "Im Skyler white yo");

$data = $mysqldb->read();

print_r($data);

$mysqldb->connect();






