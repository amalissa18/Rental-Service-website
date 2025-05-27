<?php
session_start();
require_once 'connection.php';

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];


    $stmt = $con->prepare("SELECT * FROM payments WHERE id = ?");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $title = $result->fetch_assoc()['name'];
    $user_id =  $_SESSION['id'];
    echo $user_id;
    $description = 'is rented successfully!';
    $stmt = $con->prepare("INSERT INTO notification (title, description, user_id) VALUES (?,?,?)");
    $stmt->bind_param("ssi", $title, $description, $user_id);
    $stmt->execute();

    // Update the product status to 'unavailable'
    $stmt = $con->prepare("UPDATE products SET status='unavailable' WHERE id IN (SELECT product_id FROM payments WHERE id = ?)");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();


    // Delete the payment from the 'payments' table
    $stmt = $con->prepare("DELETE FROM payments WHERE id = ?");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
    
    // Store the approval status in a session variable
    $_SESSION['approval_status'] = true;
    $_SESSION['user_id'] = $user_id;

    $_SESSION['product_id'] = $product_id;
    // Redirect to insert.php
    header('Location: insert.php');
    exit;
}
