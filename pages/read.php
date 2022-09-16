<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Read</title>
</head>
<body>
    <?php
       require '../vendor/autoload.php';
       include('../DB/_db.php');  
       $dotenv = Dotenv\Dotenv::createImmutable('../');
       $dotenv->load();
       
       $mysqldb = new _db();
       
       $data = $mysqldb->read();


       if($data == null) { echo "<div class='center'>No posts</div>"; return; } 

       for($i = 0; $i<count($data); $i++)
       {
          $name = $data[$i]['name'];
          $content = $data[$i]['content'];
          $date = $data[$i]['date'];
          $id = $data[$i]['id'];

          echo "<div class='post'>
               <h1>{$name}</h1>
               <p>{$content}</p>
               <h5>{$date}</h5>
               <div>
                 <a href='./update.php?id={$id}'>Update</a>
                 <a href='./delete.php?id={$id}'>Delete</a>
               </div>
          </div>";
       }
       
    ?>
</body>
</html>