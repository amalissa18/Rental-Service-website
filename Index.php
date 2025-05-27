<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta hp-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Services</title>
   

    <link rel="shortcut icon" href="Rent.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        *{
    padding: 0;
    margin: 0;
    font-family: "Poppins", sans-serif;
}
header {
    height: 7%;
    margin: auto;
    transition: -3s linear;
    position: fixed;
    width: 100%;
    top: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: #eeeff1;
    padding: 5px 100px;
}
header nav {
    width: 100%;
    height: 7%;
    margin: 5px auto;
    align-items: center;
    display: flex;
    justify-content: space-between;
}
header nav h4 {
    margin: 200px;
}
header nav .right_bx{
    display: flex;
    align-items: center;
}

header nav .right_bx ul{
    list-style: none;
    display: flex;
    align-items: center;
}
header nav .right_bx ul li{
    padding: 10px 25px;
}
header nav .right_bx ul li:nth-last-child(1){
    border: 1px solid blue;
    border-radius: 20px;
    padding: 3px 20px;
}
header nav .right_bx ul li:nth-last-child(1) a{
    color:rgb(0, 102, 255);
}
header nav .right_bx ul li:nth-last-child(1) a:hover{
    color:black;
}
header nav .right_bx ul li a{
    text-decoration: none;
    color: blue;
    font-size: 15px;
    font-weight: 500;
    transition: -3s linear;
}

header nav .right_bx ul li a:hover{
    color: black;
}
header nav .header-logout a{
    text-decoration: none;
}
.search-container {
    display: flex;
    justify-content: center left;
    margin-top: 4rem;
    margin-left: 20px;
  }
  
  .search-container form {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 0.5rem;
  }
  
  .search-container input[type="text"] {
    flex-grow: 1;
    padding: 0.25rem;
    margin-right: 0.5rem;
  }
  
  .search-container button {
    padding: 0.25rem 0.5rem;
    background-color: #6382d8;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
.properties-container{
    display: inline-flex;
    flex-wrap: wrap; /* Allow the boxes to wrap when there's not enough space */
    justify-content: space-between; /* Center the boxes horizontally */
    padding-top: 30px;
}
.box {
    background: var(#fff);
    padding: 10px;
    width: 240px;
    height: auto;
    border-radius: 1rem;
    box-shadow: 2px 2px 18px rgb(14 52 54 / 15%);
    margin-right: 20px;
    margin-left: 20px;
    
}

.properties-container .box .img {
    width: 150px; /* Set a specific width */
    height: auto; /* Allow the height to adjust based on the image's aspect ratio */
    display: inline-flex; /* Display as inline flex */
    align-items: center; /* Align items vertically center */
    justify-content: center; /* Align items horizontally center */
    border-radius: 0.5rem; /* Add border-radius for rounded corners */
    overflow: hidden; 
    }
.properties-container .box .img img {
    max-width: 100%; /* Ensure the image doesn't exceed the container width */
    height: auto; /* Allow the height to adjust based on the image's aspect ratio */
}
.gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 20px;
}

.gallery a {
    text-decoration: none;
    color: inherit;
}

.gallery img {
    width: 100%;
    height: auto;
}

.photo-details {
    max-width: 600px;
    margin: 0 auto;
    text-align: center;
}

.photo-details img {
    max-width: 100%;
    height: auto;
}
.property-box {
    margin-top: 5rem;
    margin-left: 2rem;
    width: 500px;
    padding: 40px;
    border-radius: 10px 10px 10px 10px;
    border: 4px solid #ccc;
    box-sizing: border-box; /* Include padding and border in the total width */
    margin-bottom: 20px; /* Add some space between boxes */
    display: grid; /* Use flexbox to stack image and content vertically */
    flex-direction: column;
  }
  
  .property-box img {
    width: 400px;
    height: 350px;
    object-fit: cover;
    border-radius: 10px;
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
    margin-left: 2rem;
    width: 500px;
    padding: 40px;
    border-radius: 10px 10px 10px 10px;
    border: 4px solid #ccc;
    box-sizing: border-box; /* Include padding and border in the total width */
    margin-bottom: 20px; /* Add some space between boxes */
    display: flex; /* Use flexbox to stack image and content vertically */
    flex-direction: column;
  }
  
  .comment-title{
    text-align: center;
  }
  .search-container {
    display: flex;
    justify-content: flex-start;
    margin-top: 4rem;
    margin-left: 20px;
}

.search-container form {
    display: flex;
    align-items: center;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 0.5rem;
    width: 100%;
}

.search-container input[type="text"],
.search-container select {
    flex-grow: 1;
    padding: 0.25rem;
    margin-right: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.search-container button {
    padding: 0.25rem 0.5rem;
    background-color: #6382d8;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

         .box-img:hover{
             transform: scale(2,3);
             z-index: -2;
 } 
    </style>
</head>
<body>
<section>
<header>
    <nav> 
        <h4> <i class="bi bi-houses-fill"></i>Rental Services</h4>
        <div class="right_bx">
            <ul>
                <li><a href="a">Support</a></li>
                <li><a href="a"><i class="bi bi-globe"></i>Language</a></li>
                <li><a href="index.php">Property</a></li>
            </ul>    
        </div>  
        <div class="header-logout">
            <a href="logout.php" class="logout">Logout</a>
        </div>
    </nav>
</header>
</section>
<section class="search-container">
        <form method="get">
            <select name="search">
                <option>Search for a property...</option>
                <option>House</option>
                <option>Villa</option>
                <option>Challet</option>
            </select>&nbsp;&nbsp;
            <input type="text" name="location" placeholder="Search a Location">
          
            <button type="submit">Search</button>
        </form>
        
    </section>
<?php

  require_once 'connection.php';
  $user_id = $_SESSION['id'];
  $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';
  $searchLocation = isset($_GET['location']) ? $_GET['location'] : '';
  $sql = "SELECT * FROM products WHERE type LIKE '%$searchTerm%'";
  if (!empty($searchLocation) ) {
    // Filter by location and radius distance
    $sql .= "AND location LIKE '%$searchLocation%'";
    $all_product = $con->query($sql);}




    $all_product = $con->query($sql);
?>

<section>
<main>
       <?php
          while($row = mysqli_fetch_assoc($all_product)){
       ?>
       <div class="properties-container">
           <div class="box">
           <a href="property.php?id=<?php echo $row["id"]; ?>">
            <div class="box-img"><img src="<?php echo $row["image"]; ?>"  width="250" height="150" alt=""></div>
           </a>
                <p class="price"><h3><i class="bi bi-coin"></i><?php echo $row["price"]; ?></h3></p>
                <div class="content">
                    <div class="text">
                       
                        <p class="owner"><b><?php echo'house id: '. $row["id"]; ?></b></p>
                        <p class="owner"><b><?php echo 'Title: '.$row["title"]; ?></b></p>
                        <p class="location"><b><?php echo $row["location"]; ?></b></p>
                    </div>
                    <div class="icon">
                        <p class="area"><b><?php echo $row["area"]; ?></b></p>
                        <p class="rooms"><b><i class="bi bi-door-closed-fill"></i><?php echo $row["rooms"]; ?></b></p>
                    </div>
                </div>    
            
            
            </div>
        </div>
       <?php
       }
     ?>
</main>
</section>
 
</body>
</html>

   