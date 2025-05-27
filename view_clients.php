<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Properties</title>
  <style>
   *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: sans-serif;
   }
   body{
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background:url(house.png) center / cover ;
    background: #fff4;
  background-image: url('house.png');
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-blend-mode: multiply;
  backdrop-filter: blur(7px);
   }
   td img{
    width: 36px;
    height: 50px;
    margin-right: .2rem;
    
    vertical-align: middle;
   }
   table, th, td{
    padding: 1rem;
   border-collapse: collapse;
   }
    .table{
    width:82vw;
    height: 90vh;
    background-color:#fff5;
   backdrop-filter: blur(7px);
  box-shadow: 0 .4rem .8rem #0005;
border-radius: .8rem;
overflow: hidden;
   }
   .table_header{
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;

   }
   .table_body{
    width: 95%;
    max-height: calc(89% - .8rem);
    background-color: #fffb;
    margin: .8rem auto;
border-radius: .6rem;
overflow: auto;
text-align: center;

   }
   .table_body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;

   }
   .table_body::-webkit-scrollbar-thumb{
   border-radius: .5rem;
   background-color: #0004;
   visibility: hidden;

    
   }
   .table_body:hover::-webkit-scrollbar-thumb{
   
   visibility: visible;
   
    
   }
   table{
    width: 100%;

   }
   thead th{
    position: sticky;
    top:0;
    left: 0;
    background-color: #d5d1defe;

   }
   tbody tr:nth-child(even){
    background-color: #0000000b;
   }
   tbody tr:hover{
    background-color: #fff6;

   }
   .button{
    width: 200px;
                height: 35px;
                background: blueviolet;
                border: 1px solid #fff;
                cursor: pointer;
                border-radius: 10px;
                color: white;
                font-family: 'Exo', sans-serif;
                font-size: 20px;
                font-weight: 400;
                padding: 3px;
                margin-top: 5px;
   }
   .table_header h1{
    color: #fff;
   }
  </style>
</head>
<body>
  <main class="table">
    <section class="table_header">
    <h1>View Clients</h1>
    </section>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: login.php');
        exit;
    }
    // Include the database connection file
    include 'connection.php';

    // Fetch the properties from the database
    $sql = "SELECT * FROM users where username!='admin'";
    $result = mysqli_query($con, $sql);

    // Display the properties in a table
    if (mysqli_num_rows($result) > 0) {
      
      echo '<table class="table_body">';
      echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>Action</th></tr>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['username'] . '</td>';
        
        echo '<td>' . $row['email'] . '</td>';
        
        echo '<td>';
        echo '<form method="post" action="remove_client.php">';
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
        echo '<button type="submit" class="button" name="remove_client" >Remove</button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
      }
     echo '</table>';
    } else {
      echo '<p>No properties found.</p>';
    }

    // Close the database connection
    mysqli_close($con);
    ?>
  </main>
</body>
</html>