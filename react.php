<?php

include('dbConnection.php');

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=UTF-8');

$info = "SELECT * FROM `usuarios`";
$result = $mysqli->query($info) or die("Error while checking DataBase !!!" . $mysqli->error);

 while($row = $result->fetch_array())
{
    $rows[] = $row;
} 

 foreach($rows as $row)
{
    echo json_encode($row);
} 



http_response_code(200);

?>