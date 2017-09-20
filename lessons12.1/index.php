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
    <link href="bootstrap.min.css" rel="stylesheet">

</head>
<body>
<table>
    <?php foreach (getall() as $key=>$product ) : ?>
    <tr>
        <td><?php echo $product[0] ??'' ?></td>
        <td> <?php echo $product [1] ?? '' ?></td>
        <td>
            <a href="<?php echo '/lesson12.1/view.php?id=' . ($key +1) ?>">просмотр</a>
        </td>
        <td>
            <a href="<?php echo '/lesson12.1/edit.php?id=' . ($key +1) ?>">Редактировать</a>
        </td>
        <td>
            <form action ="/lesson12.1/index.php" method="post">
        <input type ="hidden" name="id" value ="<?php echo $key+1 ?>">
                <button type="submit" name="delete">Удалить</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<form action="index.php" method="post">
    <input type="text" name="title" placeholder="Название">
    <input type="text" name="price" placeholder="Цена">
    <button type="submit" name ="add">Добавить</button>
</form>
</body>
</html>
