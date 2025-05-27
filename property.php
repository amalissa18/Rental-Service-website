<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="IND.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <title>Property</title>
    <style>
    .property-box {
    margin-top: 3rem;
    margin-left: 2rem;
    width: 500px;
    padding: 40px;
    border-radius: 10px 10px 10px 10px;
    align-items: center;
    /* Include padding and border in the total width */
    margin-bottom: 20px; /* Add some space between boxes */
    display: grid; /* Use flexbox to stack image and content vertically */
    flex-direction: column;
  }
  
  .property-box img {
    width: 700px;
    height: 500px;
    object-fit: cover;
    
  }

  .property-details {
    flex: 1;
    margin-left: 20px;
  }
  
  .property-title {
    font-size: 2rem;
    margin-bottom: 10px;
  }
  
  .property-details p {
    font-size: 1.2rem;
    margin-bottom: 10px;
  }
  
  .review-box {
    margin-top: 5px;
    align-items: center;
    border: 4px solid #ccc;
    margin-left: 2rem;
    width: 400px;
    padding: 40px;
    border-radius: 10px 10px 10px 10px;
  }
  
  .review-title {
    font-size: 1.5rem;
    margin-bottom: 10px;
  }
  
  .review-stars {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
  }
  
  .review-stars i {
    color: #ffc107;
    font-size: 1.5rem;
    margin-right: 5px;
  }
  
  .review-count {
    font-size: 1.2rem;
    margin-bottom: 10px;
  }
  
  .review-btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #6382d8;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1.2rem;
    cursor: pointer;
  }
  
  .review-btn:hover {
    background-color: #0044ff;
  }
  .property-image {
    object-fit: cover; /* Scale the image to cover the entire area */
    border-radius: 30px 30px 30px 30px; /* Add rounded corners to the top of the image */
   
  }
  
  .property-title {
    margin-top: 10px; /* Add some space between image and title */
  }
  
  .property-details {
    margin-top: 10px; /* Add some space between title and details */
    gap: 2rem;
  }
  .comment-box {
    margin-top: 5rem;
    margin-left: 6rem;
    width: 500px;
    padding: 40px;
    border-radius: 10px 10px 10px 10px;
    border: 4px solid #ccc;
    box-sizing: border-box; /* Include padding and border in the total width */
    

    flex-direction: column;
   
    margin-top: 5px;
    align-items: center;
    
    padding: 40px;
    border-radius: 10px 10px 10px 10px;
  }
  
  .comment-title{
    text-align: center;
  }
  .payment .btn{
    text-decoration: none;
    padding: 10px 20px;
    background: #474fa0;
    color: #fff;
    border-radius: 0.5rem;
}
.payment .btn:hover{
    background: blue;
}
.property-container {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
}

.property-box {
  /* existing styles */
  flex: 1 1 500px;
}

.calculator {
margin-top: 40px;
  flex: 1 1 200px;
  
  padding: 40px;
  border-radius: 10px 10px 10px 10px;
}

.calculator h3 {
  font-size: 1.5rem;
  margin-bottom: 10px;
}

.calculator form {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

.calculator label {
  font-size: 1.2rem;
}

.calculator input[type="number"] {
  padding: 10px;
  font-size: 1.2rem;
  border-radius: 5px;
  border: 2px solid #ccc;
}

.calculator button[type="button"] {
  padding: 10px 20px;
  background-color: #6382d8;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 1.2rem;
  cursor: pointer;
}

.calculator button[type="button"]:hover {
  background-color: #0044ff;
}

.calculator output {
  font-size: 1.2rem;
  font-weight: bold;
}
.payment-container{
    display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  margin-left: 4rem;
}
span {
    font-size: 1.2rem;
}
hr {
  height: 5px; /* adjust the height to reduce the line thickness */
  width: 100%; /* adjust the width to reduce the line length */
  
  background: blue;
}
    </style>
</head>
<body>
<header>
    <nav> 
        <h4> <i class="bi bi-houses-fill"></i>Rental Services</h4>
        <div class="right_bx">
            <ul>
                <li><a href="group_chat.php"><i class='bx bxs-message-dots'></i>Chat</a></li>
                <li><a href="a"><i class="bi bi-globe"></i>Language</a></li>
                <li><a href="Index.php">Property</a></li>
            </ul>    
        </div>  
        <div class="header-logout">
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </nav>
</header>
<section>
<?php


require_once 'connection.php';
// Get the product ID from the URL
$productId = $_GET['id'];

// Query the products table to get the product details
$sql = "SELECT * FROM products WHERE id = $productId ";
$result = mysqli_query($con, $sql);
//$product = $con->query($sql);
$product = mysqli_fetch_assoc($result);
echo '<div class="property-container">';
echo '<div class="property-box">';
echo '<div class="property-image"><img src="' . $product['image'] . '" alt="' . $product['title'] . '"  width="400" height="350"></div>';
echo '<h2 class="property-title"><i class="bx bx-male"></i>' . $product['owner'] . '</h2>';
echo '<div class="property-details">';
echo '<p><b>Location:</b><a href="location.php?id='. $productId .'"><i class="bx bx-current-location"></i></a>' . $product['location'] . '</p>';
echo '<div class="bath"><p><i class="bx bx-bath"></i> ' . $product['bathrooms'] . '&nbsp;&nbsp;<i class="bx bx-bed"></i> ' . $product['bedrooms'] . '&nbsp;&nbsp;<i class="bx bxs-area"></i>' . $product['area'] . '</p></div>';
echo '<div class="price"><i class="bx bxs-coin-stack"></i>&nbsp;<b>' . $product['price'] . '</b></div>';
echo '</div>';
echo '</div>';
echo '<div class="calculator">
<h3>Rent Calculator</h3>
<form>
  <label for="price">Price:</label>
  <input type="text" id="price" name="price" value="' . $product['price'] . '">
  <br>
  <label for="months">Number of months:</label>
  <input type="number" id="months" name="months" value="0">
  <br>
  <button type="button" id="calculate">Calculate</button>
  <br>
  <label for="total">Total:</label>
  <output id="total" name="total"></output>
</form>
</div>';
echo '<hr>';

echo '<form method="POST" enctype="multipart/form-data">';
echo '<div class="payment-container">';
echo '<div class="payment"><h3>Method Of Payment</h3><br><b>' . $product['owner'] .' you have to pay <span id="totalamount"></span></b><br><br>';

echo '<p><span></span></p><br>
';
echo '<a href="payment.php?id='.$product['id'].'" id="rent-button" class="btn">Submit Payment</a>';
echo '</div>';
echo '<div class="upload"><h3>Required</h3><br><p><span>You have to fill the payment form to be able to rent the house</span></p></div>';

echo '</div><br><br></form><hr>';
echo '<div class="comment-box">';
echo '<div class="comment">';
echo '<h3 class="comment-title">Comments about property</h3><p>' . $product['comments'] . '</p></div>';
echo '</div>';
?>     


<?php 
if (isset($_POST['submit'])){

    $name = $_POST['user_name'];
    $review = $_POST['review'];
    $rate = $_POST['rating'];
    $productId = $_GET['id'];
    $email = $_POST['email'];
    $query = "INSERT INTO reviews values ('', '$productId', '$name', '$review','$email','$rate')";
    mysqli_query($con, $query);
    echo "<script>
    alert('Data inserted succesfully');</script>";
}

?>
<!-- <div class="review-box">
  
  <div class="review-stars">
  <form action="" method="post" autocomplete="off">
    <input type="radio" name="rating" value="1">
    <label for="star1"><i class="fas fa-star"></i></label>
    <input type="radio" name="rating" value="2">
    <label for="star2"><i class="fas fa-star"></i></label>
    <input type="radio" name="rating" value="3">
    <label for="star3"><i class="fas fa-star"></i></label>
    <input type="radio" name="rating" value="4">
    <label for="star4"><i class="fas fa-star"></i></label>
    <input type="radio" name="rating" value="5">
    <label for="star5"><i class="fas fa-star"></i></label>
  </div>
  <p class="review-count"><label for="user-name">Your Name:</label><br>
  <textarea id="user_name" name="user_name" rows="4" cols="50"></textarea></p>
  <p class="review-count"><label for="review">Your Review:</label><br>
  <textarea type="text" id="review" name="review" rows="4" cols="50"></textarea></p><br>
  <p class="review-count"><label for="review">Your Email:</label><br>
  <textarea type="text" id="review" name="review" rows="4" cols="50"></textarea></p><br>
  <input type="hidden" name="rating" value="">
  <input type="hidden" name="productId" value="<?php echo $productId; ?>">
  
</div>     -->
<form action="https://formsubmit.co/amalissa313@gmail.com" method="POST" >
                    <div class="review-box">
                    <div class="review-stars">
  <form action="" method="post">
    <input type="radio" id="star1" name="rating" value="one">
    <label for="star1"><i class="fas fa-star"></i></label>

    <input type="radio" id="star2" name="rating" value="two">
    <label for="star2"><i class="fas fa-star"></i></label>

    <input type="radio" id="star3" name="rating" value="three">
    <label for="star3"><i class="fas fa-star"></i></label>

    <input type="radio" id="star4" name="rating" value="four">
    <label for="star4"><i class="fas fa-star"></i></label>
    
    <input type="radio" id="star5" name="rating" value="five">
    <label for="star5"><i class="fas fa-star"></i></label> 
  </div>
                      <h3 class="review-title">Write A Review about this property</h3>
                      <p class="review-count"><label for="name">Your Name:</label><br>
  <textarea id="name" name="name" rows="4" cols="50"></textarea></p>
  <p class="review-count"><label for="review">Your Feedback:</label><br>
  <textarea type="text" id="feedback" name="feedback" rows="4" cols="50"></textarea></p><br>
  <p class="review-count"><label for="email">Your Email:</label><br>
  <textarea type="text" id="email" name="email" rows="4" cols="50"></textarea></p><br>
  
  <input type="hidden" name="productId" value="<?php echo $productId; ?>">
  
  <button type="submit" class="review-btn" id="submit-review">Submit Review</button></div></form>
                
</form>

    </div>


</section>
<script>
  const calculateButton = document.getElementById("calculate");
const priceInput = document.getElementById("price");
const monthsInput = document.getElementById("months");
const totalOutput = document.getElementById("total");
const totalAmountSpan = document.getElementById("totalamount");

calculateButton.addEventListener("click", () => {
  const price = parseFloat(priceInput.value);
  const months = parseFloat(monthsInput.value);
  const total = price * months;
  totalOutput.value = total.toFixed(2);
  totalAmountSpan.textContent = total.toFixed(2);
  
});
</script>
</body>
</html>