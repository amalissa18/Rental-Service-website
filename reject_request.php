<?php
session_start();
require_once 'connection.php';

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];
    $stmt = $con->prepare("DELETE FROM pending_requests WHERE id =?");
    
    $stmt->bind_param("i", $request_id);
    $stmt->execute();

    $stmt->close();
    $con->close();
}

header('Location: admin.php');
exit;