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
            background: blue;
            border: 1px solid #fff;
            cursor: pointer;
            border-radius: 15px;
            color: blue;
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
font:bold;
color:blue;
font-weight: 500;
        }
.login p{
   
            border-radius: 15px;
            color: whitesmoke;
            font-family: 'Exo', sans-serif;
            font-size: 13px;
            font-weight: 300;}
        
    </style>
</head>
<body>
    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>SIGN<span>UP</span></div>
    </div>
    <form action="register.php" method="post" onsubmit="return validateform()">
        <br>
        <div class="login">
            <input id="username" name="username" placeholder="Enter a Username" type="text" />
            <br><br>
            <input id="email" name="email" placeholder="Enter your Email" type="text" />
            <input id="password" name="password" required="" placeholder="Enter a Password" type="password" />
            <br>
            <p>Password Contains:<br>
                .At least 8 characters.<br>
               .At least 1 Character(A-Z).</p>
            <br>
            <div>
                <input name="register" type="submit" class="btn" name="register" value="Register">
                <a href="login.php" color="white">Already Have an Account?</a>
            </div>
        </div>
    </form>

    <?php
    // Check if the form is submitted
    if (isset($_POST['register'])) {
        // Connect to the database
        $mysqli = new mysqli("localhost", "root", "", "rental services");

        // Check for errors
        if ($mysqli->connect_error) {
            die("Connection failed: ". $mysqli->connect_error);
        }

        // Prepare and bind the SQL statement
        if ($stmt = $mysqli->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)")) {
            $stmt->bind_param("sss", $username, $email, $password);

            // Get the form data
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Validate the email and password
            if (!preg_match("/^[\w-]+(\.[\w-]+)*@(gmail\.)?com/", $email)) {
                echo "<script>alert('Invalid email format. Please use the format username@rental.services.lb');</script>";
                exit;
            }
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/", $password)) {
                echo "<script>alert('Password must be at least 8 characters long with 1 capital letter');</script>";
                exit;
            }

            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Execute the SQL statement
            if ($stmt->execute()) {
                // Account created successfully, redirect to login page
                echo "<script>alert('Account created successfully!');
                window.location.href='login.php';
                 </script>";
                exit;
            } else {
                // Error creating account, stay on the same page
                echo "<script>alert('Error creating account. Please try again.');
                window.location.href='register.php';</script>";
                exit;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error preparing statement: ". $mysqli->error;
        }

        // Close the connection
        $mysqli->close();
    }
    ?>

    <script>
        // Validate the form
        function validateform() {
            // Get the form data
            var username = document.getElementById("username").value;
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;

            // Check if the username is empty
            if (username == "") {
                alert("Username cannot be empty");
                return false;
            }

          

            // Check if the password is empty
            if (password == "") {
                alert("Password cannot be empty");
                return false;
            }

            
        }
    </script>

</body>

</html>