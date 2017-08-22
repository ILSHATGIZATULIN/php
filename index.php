<?php
//echo '<pre>';
//var_dump($_REQUEST);
$message= false;//
$error= false ;// для ошибок
if (isset($_REQUEST['name']) and isset ($_REQUEST['phone'])) {
    $name = $_REQUEST['name'];
    $phone = $_REQUEST['phone'];

    if (empty($name) || empty($phone)) {
        ;$error= ' Заполните поля';
    } else {
        $row = 'здравтсвуйте,' . $name .
            'Ваш номер:' . $phone . PHP_EOL;
        file_put_contents('./contacts.txt',
            $row,
            FILE_APPEND);
        $message = 'Спасибо мы с вами свяжемся.';

    }
}
?>

<!doctype html>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css.">
</head>
<body>
<div class="container">


    <h3> Форма обратной связи</h3>
    <?php if ($message): ?>

        <?=$message?>

    <?php else: ?>





    <form class="form-horizontal" role="form" action= "index.php" method="post">
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Имя</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control"  placeholder="Введите имя">
            </div>
        </div>
        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Номер телефона</label>
            <div class="col-sm-10">
                <input type="text" name="phone" class="form-control"  placeholder="Введите номер">
            </div>
        </div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Отправить</button>
    </div>
    <p class ="alert-danger col-sm-4"><?=$error ?></p>
</div>
</form>

<?php endif; ?>
</body>
</html>

