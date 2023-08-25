<?php
require_once('./setup.php');

$page = (int)$_GET["page"];
$sql = "SELECT * FROM rooms WHERE offer != 0 ORDER BY id LIMIT 9 OFFSET " . 9 * $page . ";";
$result = $conn->query($sql);
$count_res = $conn->query("SELECT COUNT('id') as 'count' FROM rooms WHERE offer != 0");

$count_res = ($count_res->fetch_assoc())['count'];

$pages = ceil($count_res / 9);

echo $blade->run('offers', ["rooms" => $result, "count" => $count_res, "page" => $page, "pages" => $pages]);
?>