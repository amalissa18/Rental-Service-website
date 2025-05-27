<?php

session_start();
$_SESSION['submit_payment'] = true;
$productId = 0;
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
}
if (isset($_POST['submit_payment'])) {
    require_once 'connection.php';
    $user_id = $_SESSION['id'];
    $name = $_POST['name'];
    $paymentdate = $_POST['paymentdate'];
    $productId = $_POST['productID'];
    $omtpayphoto = $_FILES['omtpayphoto']['name'];
    $omtpayphoto_tmp_name = $_FILES['omtpayphoto']['tmp_name'];
    $omtpayphoto_path = 'img/' . $omtpayphoto;
    $motivationletter = $_POST['motivationletter'];
    
    $sql_products = "SELECT user_id FROM products WHERE id = $productId";
    $result_products = $con->query($sql_products);
    $owner_id = 0;
    if ($result_products->num_rows > 0) {
        $row_products = $result_products->fetch_assoc();
        $owner_id = $row_products['user_id'];
    }
    if (move_uploaded_file($omtpayphoto_tmp_name, $omtpayphoto_path)) {
        $stmt = $con->prepare("INSERT INTO payments (product_Id,name, paymentdate, omtpayphoto, user_id,motivationletter, owner_id) VALUES (?,?, ?, ?, ?, ?,?)");
        $stmt->bind_param('isssisi', $productId, $name, $paymentdate, $omtpayphoto_path, $user_id,$motivationletter, $owner_id);

        if ($stmt->execute()) {
            $message[] = 'Your payment has been submitted successfully wait for house owner approval.';
        } else {
            $message[] = 'Error adding payment to database.';
        }
    } else {
        $message[] = 'Error uploading payment photo.';
    }
} else {
    $message[] = 'Error uploading payment photo.';
}


if (!empty($message)) {
    foreach ($message as $msg) {
        echo '<p class="message">' . $msg . '</p>';
    }
}
?>

<!-- HTML -->
<html>

<head>
    <title>Make Payment</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Payment Method</h4>
                </div>
                <div class="card-body">
                    <form action="payment.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left column -->
                                <label for="title">Name:</label>
                                <input type="text" id="name" name="name" class="form-control mb-2" placeholder="Enter your name" required>
                                <input type="hidden" value="<?php echo $productId ?>" id="productID" name="productID" class="form-control mb-2 ">
                                <label for="omtpayphoto">Payment Photo:</label>
                                <input type="file" id="omtpayphoto" name="omtpayphoto" class="form-control mb-2" required>
                                <label for="paymentdate">Payment Date:</label>
                                <input type="date" id="paymentdate" name="paymentdate" class="form-control mb-2" required>
                                <label for="motivationletter">Motivation letter:</label>
                                <input type="textarea" id="" name="motivationletter"placeholder="This letter must include more details about the members that wont to live in the rented house" class="form-control mb-2" required>

                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="submit_payment" value="Submit" class="btn btn-primary mt-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- CSS -->
<style>
    body {
        font-family: Arial, sans-serif;
        border: 1px solid #e3e3e3;
        border-radius: 5px;
        padding: 10px;
        margin: 10px auto;
        max-width: 100%;
        position: absolute;
        top: 0;
        left: 0;
        background: rebeccapurple;
  background-image: url('house.png');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-blend-mode: multiply;
  
        width: 100%;
        height: 100%;
        z-index: 0;

        background-size: cover;
        background-position: center;
    }


    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 5px white;
        overflow: hidden;
        background-color: #fff2;
    }

    .card-header {
        border-bottom: 1px solid white;
        padding-bottom: 10px;
    }

    .card-header h4 {
        color: white;
        text-align: center;
        font-size: 50px;
    }

    .card-body {
        padding-top: 20px;
    }

    .row {
        display: flex;
    }

    .col-md-6 {
        flex: 1;
        padding: 10px;
        color: white;
        font-weight: 1000;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .btn {
        padding: 10px;
        background-color: blueviolet;
        color: white;
        border: none;
        cursor: pointer;
        font-weight: 900;
        
        align-items: center;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .message {
        padding: 10px;
        background-color: white;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>