<?php
require_once './database.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table>
    <?php foreach (getall() as $product ) : ?>
        <tr>
            <td><?php echo $product[0] ?></td>
            <td> <?php echo $product [1] ?></td>
        </tr>
    <?php endforeach;; ?>
</table>

<form action="index.php" method="post">
    <input type="text" name="title" placeholder="Название">
    <input type="text" name="price" placeholder="Цена">
    <button type="submit" name ="submit">Добавить</button>
</form>
</body>
</html>