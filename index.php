<?php
//echo '<pre>';
//var_dump($_REQUEST);

$message= false;

if (isset($_REQUEST [ 'name']) and isset ($_REQUEST['phone'])) {

    $name = $_REQUEST ['name'];
    $phone = $_REQUEST['phone'];

    $row = 'здравтсвуйте,' . $name .
        'Ваш номер:' . $phone . PHP_EOL;
    file_put_contents('./contacts.txt',
        $row,
        FILE_APPEND);


    $message = 'Спасибо мы с вами свяжемся.';
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
<?php if ($message): ?>
<?=$message ?>
    <?php else: ?>
<form action="index.php" metod="post">
<p>представтесь</p>
<input type ="text"  name ="name">
       <p>Укажите ваш номер</p>
<input type ="text" name="phone">
    <button type="submit">Отправить</button>
</form>
<?php endif; ?>

</body>

</html>


