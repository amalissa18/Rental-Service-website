<?php
session_start();
include 'connection.php';
$user_id = 0;
if(isset($_SESSION['id'])){
    $user_id = $_SESSION['id'];
}

$query = "SELECT * FROM  notification WHERE user_id = $user_id";
$run = $con->query($query);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'poppins', sans-serif;
        }


        .topbar {
            color: white;
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
            background-color: white;



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

        .cards :hover {
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
            font-size: 90px;
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

        .aaa {
            background: darkblue;
            color: #fff;
            padding: 10px 15px;
            border-radius: 8px;
            margin-top: 20px;
            cursor: pointer;
            font-weight: 800;
        }

        .aaa :hover {
            background-color: #fff;
        }

        .noti {
            margin: 100px;
        }

        .box {
            margin: 10px;
            padding: 10px;
            border-radius: 10px;
            background-color: lightgray;
        }

        .box h2 {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <class="conatiner">
        <div class="topbar">
            <class="logo">
                <h2>Rental Services</h2>
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
        <div class="main">
            <div class="box">
                <h2>
                    Notifications
                </h2>
                
        <?php  while($row = mysqli_fetch_assoc($run)){ ?>
                <div>
                    <h4><?php echo 'house with id: '.$row['user_id'] .$row['description']  ?></h4>
                </div>

                <?php }?>
            </div>

        </div>
        </div>

</body>

</html>