<?php
require_once('./setup.php');

$id = (int)$_GET["id"];
$room = $conn->query("SELECT * FROM rooms WHERE id = " . (int)$id . ";");

$room = $room->fetch_assoc();

$result = $conn->query("SELECT * FROM rooms WHERE room_type = " . $room["room_type"] . " AND id != " . (int)$id . ";");

echo $blade->run('details', ["rooms" => $result, "room" => $room]);
?>