<?php
require_once('./setup.php');

$page = (int) $_GET["page"];

$skip = $page * 9;
if ($_GET['from'] && $_GET['to']) {

    $sql = "SELECT * FROM rooms r LEFT JOIN (SELECT * FROM bookings b WHERE NOT (b.id IS NULL OR b.check_in > ? OR b.check_out < ?)) b ON r.id = b.room WHERE b.id IS NULL ORDER BY r.id LIMIT 9 OFFSET ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $_GET['to'], $_GET['from'], $skip);
    $stmt->execute();
    $result = $stmt->get_result();

    $sql = "SELECT COUNT('r.id') as 'count' FROM rooms r LEFT JOIN (SELECT * FROM bookings b WHERE NOT (b.id IS NULL OR b.check_in > ? OR b.check_out < ?)) b ON r.id = b.room WHERE b.id IS NULL;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $_GET['to'], $_GET['from']);
    $stmt->execute();
    $count_res = $stmt->get_result();
} else {
    $sql = "SELECT * FROM rooms ORDER BY id LIMIT 9 OFFSET ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $skip);
    $stmt->execute();
    $result = $stmt->get_result();

    $sql = "SELECT COUNT('id') as 'count' FROM rooms;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $count_res = $stmt->get_result();
}

$count_res = ($count_res->fetch_assoc())['count'];

$pages = ceil($count_res / 9);

echo $blade->run('rooms', ["rooms" => $result, "page" => $page, "pages" => $pages, "from" => $_GET['from'], "to" => $_GET['to']]);
?>