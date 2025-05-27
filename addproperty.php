<?php
session_start();

if (isset($_POST['add_product'])) {
    require_once 'connection.php';
    if (isset($_GET['id'])) {
        $user_id = $_GET['id'];
    }

    // Check if file was uploaded successfully
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
      
            // File uploaded successfully, continue with database insertion
            $title = $_POST['title'];
            $price = $_POST['price'];
            $rooms = $_POST['rooms'];
            $bathrooms = $_POST['bathrooms'];
            $bedrooms = $_POST['bedrooms'];
            $area = $_POST['area'];
            $location = $_POST['location'];
            $owner = $_SESSION['username'];
            $user_id = $_SESSION['id'];
            $type = $_POST['type'];
            $status = $_POST['status'];
            $comment = $_POST['comments'];
            $uploadeddate = $_POST['uploadeddate'];
            $request = 'pending';
            $image = $_FILES['image']['name'];
           $image_tmp_name = $_FILES['image']['tmp_name'];
           $image_path = 'img/' . $image;
         $titledeed = $_FILES['titledeed']['name'];
          $titledeed_tmp_name = $_FILES['titledeed']['tmp_name'];
           $titledeed_path = 'img/' . $titledeed;

            // Insert form data into the database
            $stmt = $con->prepare("INSERT INTO pending_requests (title, image, price, rooms, bathrooms, bedrooms, area, location, owner, type, status,titledeed, comments, uploadeddate, request, user_id) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiiiisssssssssi", $title, $image_path, $price, $rooms, $bathrooms, $bedrooms, $area, $location, $owner, $type, $status,$titledeed_path , $comment, $uploadeddate, $request, $user_id);

            if ($stmt->execute()) {
                $message[] = 'Your request has been sent to the admin. Please wait for approval.';
            } else {
                $message[] = 'Error adding request to database.';
            }
        } else {
            $message[] = 'Error moving uploaded file.';
        }
    } else {
        $message[] = 'No file uploaded or file upload error occurred.';
    }

    // Display error messages
    if (!empty($message)) {
        foreach ($message as $msg) {
            echo '<p class="message">' . $msg . '</p>';
        }
    }

?>



<!-- HTML -->
<html>

<head>
    <title>Add Property</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Your Property</h4>
                </div>
                <div class="card-body">
                    <form action="addproperty.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Left column -->
                                <label for="title">Title:</label>
                                <input type="text" id="title" name="title" class="form-control mb-2" placeholder="Enter a title for your property" required>

                                <label for="price">Price:</label>
                                <input type="text" id="price" name="price" class="form-control mb-2" placeholder="Enter a price" required>

                                <label for="rooms">Rooms:</label>
                                <input type="number" id="rooms" name="rooms" class="form-control mb-2" placeholder="Enter the number of rooms" required>

                                <label for="bedrooms">Bedrooms:</label>
                                <input type="number" id="bedrooms" name="bedrooms" class="form-control mb-2" placeholder="Enter the number of bedrooms" required>

                                <label for="bathrooms">Bathrooms:</label>
                                <input type="number" id="bathrooms" name="bathrooms" class="form-control mb-2" placeholder="Enter the number of bathrooms" required>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="comments">Comments:</label>
                                        <textarea id="comments" name="comments" class="form-control mb-2" rows="4" cols="100" placeholder="Describe your property" required></textarea>
                                    </div>
                                </div>
                                <label for="image">Image:</label>
                                <input type="file" id="image" name="image" class="form-control mb-2" required>
                                <label for="uploadeddate">Uploaded Date:</label>
                                <input type="date" id="uploadeddate" name="uploadeddate" class="form-control mb-2" required>

                            </div>
                            <div class="col-md-6">
                                <!-- Right column -->
                                <label for="area">Area:</label>
                                <input type="text" id="area" name="area" class="form-control mb-2" placeholder="Enter the value in meters" required>

                                <label for="location">Location:</label>
                                <input type="text" id="location" name="location" class="form-control mb-2" placeholder="Enter the property location" required>
                                <label for="titledeed">Title-deed:</label>
                                <input type="file" id="titledeed" name="titledeed" class="form-control mb-2" required>
                                

                                
                                



                                <br><br>
                                <label for="type">Type:</label>
                                <select id="type" name="type" class="form-control mb-2" required>
                                    <option value="">Select type</option>
                                    <option value="Challet">Challet</option>
                                    <option value="Villa">Villa</option>
                                    <option value="House">House</option>
                                </select>

                                <label for="status" id="status">Status:</label>
                                <select id="status" name="status" class="form-control mb-2" required>
                                    <option value="">Select status</option>
                                    <option value="available">Available</option>

                                </select>
                                <label for="request">Request:</label>
                                <select id="request" name="request" class="form-control mb-2" required>
                                    <option value="">Select request</option>
                                    <option value="pending">pending</option>

                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" name="add_product" value="Add Property" class="btn btn-primary mt-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
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

        width: 100%;
        height: 100%;
        z-index: 0;

        background-size: cover;
        background-position: center;
    }


    .card {
        border: none;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        overflow: hidden;
    }

    .card-header {
        border-bottom: 1px solid #ccc;
        padding-bottom: 10px;
    }

    .card-header h4 {
        color: #0056b3;
        text-align: center;
        font-size: 30px;
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
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    .btn {
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        cursor: pointer;
    }

    .btn:hover {
        background-color: #0056b3;
    }

    .message {
        padding: 10px;
        background-color: #f0f0f0;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>