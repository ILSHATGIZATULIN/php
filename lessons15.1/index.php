<?php
spl_autoload_register();

echo '<pre>';
$db= new Database();
$data=$db->getOne(2);
print_r($data);


