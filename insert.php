<?php

session_start();
if (isset($_POST['login'])) {
  // Connect to the database
  $mysqli = new mysqli("localhost", "root", "", "rental services");

  // Check for errors
  if ($mysqli->connect_error) {
      die("Connection failed: ". $mysqli->connect_error);
  }}
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <title>User panel</title>
</head>
<style>
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: 'poppins', sans-serif;
}


.topbar {
    position: fixed;
    background-color: navy;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.08);
    width: 100%;
    padding: 0 20px;
    height: 60px;
    display: grid;
    grid-template-columns: 2fr 10fr 0.4fr 1fr;
    align-items: center;
    z-index: 1;
}

img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.logo h2 {
    color: white;
}












/* sidebar */

.sidebar {
    position: fixed;
    top: 60px;
    width: 260px;
    height: calc(100% - 60px);
    background: navy;
    overflow-x: hidden;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    z-index: 2;
}

.sidebar ul {
    margin-top: 20px;
}

.sidebar ul li {
    width: 100%;
    list-style: none;
}

.sidebar ul li:hover {
    background: white;
}

.sidebar ul li:hover a {
    color: navy;
}

.sidebar ul li a {
    width: 100%;
    text-decoration: none;
    color: white;
    height: 60px;
    display: flex;
    align-items: center;
}

.sidebar ul li a i {
    min-width: 60px;
    font-size: 24px;
    text-align: center;
}


/* main */

.main {
    position: absolute;
    top: 60px;
    width: calc(100% - 260px);
    min-height: calc(100vh - 60px);
    left: 260px;
    background-color: lightgray;
  
 
 
}

.cards {
    width: 100%;
   
    padding: 35px 20px;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 20px;
    
}

.cards .card {
    padding: 20%;
    margin: 50%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.08);
   
}
.cards :hover{
  background-color: #888;
}
.number {
    font-size: 35px;
    font-weight: 500;
    color: darkblue;
}

.card-name {
    color: #888;
    font-weight: 600;
}

.icon-box i {
    font-size: 70px;
    color: blue;
}



@media (max-width:1115px) {
    .sidebar {
        width: 60px;
    }
    .main {
        width: calc(100% - 60px);
        left: 60px;
    }
}

@media (max-width:880px) {
    /* .topbar {
        grid-template-columns: 1.6fr 6fr 0.4fr 1fr;
    } */
    .fa-bell {
        justify-self: left;
    }
    .cards {
        width: 100%;
        padding: 35px 20px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-gap: 20px;
    }
    .charts {
        grid-template-columns: 1fr;
    }
    .doughnut-chart {
        padding: 50px;
    }
    #doughnut {
        padding: 50px;
    }
}

@media (max-width:500px) {
    .topbar {
        grid-template-columns: 1fr 5fr 0.4fr 1fr;
    }
    .logo h2 {
        font-size: 20px;
    }
    .search {
        width: 80%;
    }
    .search input {
        padding: 0 20px;
    }
    .fa-bell {
        margin-right: 5px;
    }
    .cards {
        grid-template-columns: 1fr;
    }
    .doughnut-chart {
        padding: 10px;
    }
    #doughnut {
        padding: 0px;
    }
    .user {
        width: 40px;
        height: 40px;
    }
}
.aaa{
  background:darkblue;
  color: #fff;
  padding: 10px 15px;
  border-radius: 8px;
  margin-top: 20px;
  cursor:pointer;
 font-weight: 800;
 }
 .aaa :hover{
  background-color: #fff;
 }
</style>


<body>
    <div class="container">
        <div class="topbar">
            <div class="logo">
                <h2>Rental Services</h2>
            </div>
            
           
            
        </div>
        <div class="sidebar">
            <ul>
                <li>
                <a href="#">
                        <i class="fas fa-user"></i>
                        <div><?php echo $_SESSION['username'] ?></div>
                    </a>
                </li>
              
                <li>
                    <a href="profile.html">
                        <i class="fas fa-user"></i>
                        <div>Who we are?</div>
                    </a>
                </li>
                <li>
                    <a href="addproperty.php">
                        <i class="fas fa-plus"></i>
                        <div>Upload Property</div>
                    </a>
                </li>
                <li>
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        <div>Rent Property</div>
                    </a>
                </li>
                <li>
                    <a href="rental_request.php">
                        <i class="fa fa-question"></i>
                        <div>Rental Requests</div>
                    </a>
                </li>
              
                <li>
                    <a href="notification.php">
                        <i class="fas fa-bell"></i>
                        <div>Notifications</div>
                    </a>
                </li>
                <li>
                    <a href="bot.php">
                        <i class="fas fa-question"></i>
                        <div>Help</div>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-sign-out"></i>
                        <div>logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main"><br><br>
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">Upload Property</div>
                        <div class="card-name"> <a href="addproperty.php"><button class="aaa">Upload </button></a></div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-plus"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">Rent Property</div>
                        <div class="card-name"><a href="index.php"><button class="aaa">Rent </button></a></div>
                    </div>
                    <div class="icon-box">
                        <i class="fa fa-home"></i>
                    </div>
                </div>
               
               
                <div class="card">
                    <div class="card-content">
                        <div class="number">Rental Requests</div>
                        <div class="card-name"><a href="rental_request.php"><button class="aaa" >View </button></a></div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-question"></i>
                    </div>
                </div>
            </div>
         
               
        </div>
    </div>
   
</body>
</html>
