<?php
require_once('./setup.php');

$post = $_SERVER['REQUEST_METHOD'] == 'POST';

$id = (int)$_GET["id"];

if($post) {
    $today = date("Y-m-d");

    $sql = "INSERT INTO bookings (full_name, book_order, check_in, check_out, request, room) VALUES (?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sssssi", $_POST['name'], $today, $_POST['from'], $_POST['to'], $_POST['request'], $id);
    $post = $stmt->execute();
}

$sql = "SELECT * FROM rooms WHERE id = ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$room = $stmt->get_result();

$room = $room->fetch_assoc();

$sql = "SELECT * FROM rooms WHERE room_type = ? AND id != ?;";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $room["room_type"], $id);
$stmt->execute();
$result = $stmt->get_result();


echo $blade->run('details', ["rooms" => $result, "room" => $room, "post" => $post]);
?>