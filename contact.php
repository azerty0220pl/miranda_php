<?php
require_once('./setup.php');

$post = $_SERVER['REQUEST_METHOD'] == 'POST';

if($post) {
    $today = date("Y-m-d");

    $sql = "INSERT INTO messages (full_name, email, phone, message_subject, message, sent) VALUES (?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("ssssss", $_POST['name'], $_POST['email'], $_POST['phone'], $_POST['subject'], $_POST['msg'], $today);
    $stmt->execute();
}

echo $blade->run('contact', ['post' => $post]);
?>