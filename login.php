<?php
session_start();
$username = '';
if (isset($_POST['login'])) {
    require_once 'connection.php';
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($username == 'admin' && $password == 'Admin123') {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = 1;
            header("Location: admin.php");
            exit;
        }

        $stmt = $con->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);

        if ($stmt->execute()) {
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $hashed_password);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $id;

                    if ($id == 1) {
                        header("Location: admin.php");
                    } else {
                        header("Location: insert.php");
                    }

                    exit;
                } else {
                    echo "<script>alert('Invalid password ');</script>";
                }
            } else {
                echo "<script>alert('Invalid username ');</script>";
            }
        } else {
            echo "Error: " . $con->error;
        }

        $stmt->close();
    } else {
        echo "Please enter a username and password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       
       @import url(https://fonts.googleapis.com/css?family=Exo:100,200,400);
            @import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

            body{
                margin: 0;
                padding: 0;
                background: #fff;

                color: #fff;
                font-family: Arial;
                font-size: 12px;
            }

            .body{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                width: auto;
                height: auto;
                background-image: url(house.png);
                background-size: cover;
                -webkit-filter: blur(5px);
                z-index: 0;
            }

            .grad{
                position: absolute;
                top: -20px;
                left: -20px;
                right: -40px;
                bottom: -40px;
                width: auto;
                height: auto;
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
                z-index: 1;
                opacity: 0.7;
            }

            .header{
                position: absolute;
                top: calc(50% - 35px);
                left: calc(50% - 255px);
                z-index: 2;
            }

            .header div{
                float: left;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 50px;
                font-weight: 1000;
            }

            .header div span{
                color: #5379fa !important;
            }

            .login{
                position: absolute;
                top: calc(50% - 75px);
                left: calc(50% - 50px);
                height: 150px;
                width: 350px;
                padding: 10px;
                z-index: 2;
            }

            .login input[type=text]{
                width: 250px;
                height: 30px;
                background: transparent;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 15px;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
            }
            .login a{
                color: #fff;
            }
            .login input[type=password]{
                width: 250px;
                height: 30px;
                background: transparent;
                border: 1px solid rgba(255,255,255,0.6);
                border-radius: 15px;
                color: #fff;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 4px;
                margin-top: 10px;
            }

            .login input[type=button]{
                width: 260px;
                height: 35px;
                background: blueviolet;
                border: 1px solid #fff;
                cursor: pointer;
                border-radius: 10px;
                color: #a18d6c;
                font-family: 'Exo', sans-serif;
                font-size: 16px;
                font-weight: 400;
                padding: 6px;
                margin-top: 10px;
            }

            .login input[type=button]:hover{
                opacity: 0.8;
            }

            .login input[type=button]:active{
                opacity: 0.6;
            }

            .login input[type=text]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=password]:focus{
                outline: none;
                border: 1px solid rgba(255,255,255,0.9);
            }

            .login input[type=button]:focus{
                outline: none;
            }

            ::-webkit-input-placeholder{
                color: rgba(255,255,255,0.6);
            }

            ::-moz-input-placeholder{
                color: rgba(255,255,255,0.6);
            }
            .topnav {
                overflow: hidden;
                background-color:white;
            }

            .topnav a {
                float: left;
                color: white;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                font-size: 17px;
              
            }

            .topnav a:hover {
                background-color:#fff;
                color: black;
            }

            .topnav a.active {
                background-color: #e1e3e2;
                color: black;
            }
            .btn{
	width: 20%;
	height: 30px;
	background: whitesmoke;
	border: none;
	outline:none;
	border-radius: 10px;
	cursor: pointer;
	font: 1em sans-serif;
	color:blue;
    font-weight: 400;
            }
    </style>
</head>
<body>
<div class="body"></div>
        <div class="grad"></div>
        <div class="header">
            <div>LOG<span>IN</span></div>
        </div>
        <form action="login.php" method="post">
            <br>
    <div class="login">
        
        
          
            <input id="username" name="username" placeholder="Enter Your Username" type="text" />
          
            <input id="password" name="password" required="" placeholder="Enter Your Password" type="password" /><br><br>
            <div>
            <button type="submit" class="btn" name="login">Login</button><br><br>
            <a href="register.php" color="white">Create New Account</a><br><br>
            
        </form></div></div>
    </div>
</body>
</html>