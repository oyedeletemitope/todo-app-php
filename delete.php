<?php 


$json = file_get_contents('todo.json');

$jsonArrray = json_decode($json,true);

$todoName = $_POST['to_do_name'];

unset($jsonArrray[$todoName]);

file_put_contents('todo.json', json_encode($jsonArrray, JSON_PRETTY_PRINT));

header('location:index.php');
