<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Update</title>
</head>
<body>
    <div class="center">
    <form action="../scripts/update_sc.php" method="post" class="form">
        <input type="text" name="name" placeholder="Name">
        <textarea type="text" name="content" placeholder="Content"></textarea>
        <input type="hidden" name="id" value="<?php echo $_GET['id']?>">
        <input type="submit" value="Update">
    </form>
    </div>
</body>
</html>