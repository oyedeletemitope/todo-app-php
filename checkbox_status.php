<?php

$json = file_get_contents('todo.json');
$jsonArray = json_decode($json, true); // Corrected variable name

$todoName = $_POST['to_do_name'];

$jsonArray[$todoName]['completed'] = !$jsonArray[$todoName]['completed'];

file_put_contents('todo.json', json_encode($jsonArray, JSON_PRETTY_PRINT)); // Corrected variable name

header('location: index.php'); // Added a space after the colon for proper redirection
