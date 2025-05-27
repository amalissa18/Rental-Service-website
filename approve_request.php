<?php
session_start();
require_once 'connection.php';

if (isset($_GET['request_id'])) {
    $request_id = $_GET['request_id'];
    $stmt = $con->prepare("SELECT * FROM pending_requests WHERE id =?");
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $request = $result->fetch_assoc();
    
    $success = "success";
;    if ($request) {
        // Add the product to the database
        $request_array = explode(',', $request['request']);

        foreach ($request_array as $request_value) {
            $stmt = $con->prepare("INSERT INTO products (title, image, price, rooms, bedrooms, bathrooms, area, location, owner, titledeed, type, status, comments, uploadeddate, request, user_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

            $stmt->bind_param("sssssssssssssssi", $request['title'], $request['image'], $request['price'], $request['rooms'], $request['bedrooms'], $request['bathrooms'], $request['area'], $request['location'], $request['owner'], $request['titledeed'], $request['type'], $request['status'], $request['comments'], $request['uploadeddate'], $success, $request['user_id']);
            $stmt->execute();
        }

        // Delete the request from the 'pending_requests' table
        $stmt = $con->prepare("DELETE FROM pending_requests WHERE id =?");
        $stmt->bind_param("i", $request_id);
        $stmt->execute();

        $message[] = 'Product added successfully.';
    } else {
        $message[] = 'Invalid request ID.';
    }

    $stmt->close();
    $con->close();
}

// Redirect back to admin.php
header('Location: admin.php');
exit;
?>