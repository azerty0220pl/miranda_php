<?php
require_once('./setup.php');

$sql = "SELECT * FROM rooms";
$result = $conn->query($sql);

echo $blade->run('index', ["rooms" => $result]);
?>