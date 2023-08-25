<?php
require_once('./BladeOne.php');
require_once('./config.php');

use eftec\bladeone\BladeOne;

$page = (int)$_GET["page"];
$sql = "SELECT * FROM rooms WHERE offer != 0 ORDER BY id LIMIT 9 OFFSET " . 9 * $page . ";";
$result = $conn->query($sql);
$count_res = $conn->query("SELECT COUNT('id') as 'count' FROM rooms WHERE offer != 0");

$count_res = ($count_res->fetch_assoc())['count'];

$views = __DIR__ . "/views";
$cache = __DIR__ . "/cache";

$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
echo $blade->run('offers', ["rooms" => $result, "count" => $count_res, "page" => $page]);
?>