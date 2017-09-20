
<?php
require_once './database.php';

// срабатывает если задан параметр айди элекмента
if (isset($_REQUEST['id'])){
    $product = get($_REQUEST['id']);


}
else {
    echo 'не указан id';
    die();
}
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
<h1><?php echo $product [0] ?></h1>;
<h5>цена <?php echo $product[1] ?></h5>

<form action="/lesson12.1/index.php" method="post">
    <input type ="text" name="title">
    <input type="text" name="price">
    <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
    <button type ="submit" name="edit">Сохранить</button>
</form>

</body>
</html>
