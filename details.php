<?php
require_once('./BladeOne.php');
require_once('./config.php');

use eftec\bladeone\BladeOne;

$id = (int)htmlspecialchars($_GET["id"]);
$room = $conn->query("SELECT * FROM rooms WHERE id = " . (int)$id . ";");

$room = $room->fetch_assoc();

$result = $conn->query("SELECT * FROM rooms WHERE room_type = " . $room["room_type"] . " AND id != " . (int)$id . ";");

$views = __DIR__ . "/views";
$cache = __DIR__ . "/cache";

$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
echo $blade->run('details', ["rooms" => $result, "room" => $room]);
?>