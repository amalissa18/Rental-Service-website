<?php
// Include the database connection file
include 'connection.php';

// Get the ID of the property to remove
$id = $_POST['id'];

// Remove the property from the database
$sql = "DELETE FROM products WHERE id=$id";
mysqli_query($con, $sql);

// Redirect back to the view properties page
header('Location: view_offers.php');
exit;
?>