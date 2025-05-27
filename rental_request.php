<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Rented Properties Requests</title>
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
   td img:hover{
    height: 100%;
    transform: scale(6);
   }
   td img{
    width: 56px;
    height: 70px;
    
    transition: transform 0.3s ease-in-out;

    object-fit: cover;
    
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
    <h1>View Pending Requests </h1>
    </section>
    <?php
session_start();
$user_id = $_SESSION['id'];
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$db = new mysqli('localhost', 'root', '', 'rental services');

if ($db->connect_error) {
    die('Error: ' . $db->connect_error);
}

$result = $db->query("SELECT * FROM payments where owner_id = $user_id");
    // Display the properties in a table
    if (mysqli_num_rows($result) > 0) {

    // Display the properties in a table
    
      
      echo '<table class="table_body">';
      echo '<tr><th>Id</th><th>Name</th><th>Property Id</th><th>Payment photo</th><th>Payment date</th><th>Action1</th><th>Action2</th></tr>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['name'] . '</td>';
        echo '<td>' . $row['product_Id'] . '</td>';
        echo '<td><img src="' . $row['omtpayphoto'] . '" alt="' . $row['omtpayphoto'] . '" width="100"></td>';
        echo '<td>' . $row['paymentdate'] . '</td>';
        
       
       
    
        
        
        echo '<td>';
       
     
        echo ' <button class="button" onclick="approveRequest(' . $row['id'] . ')">Approve</button>';
      
        echo '</td>';
       
        echo '<td>';
       
        echo' <button class="button" onclick="deleteRequest(' . $row['id'] . ')">Delete</button>';
      
        echo '</td>';
       
        
        echo '</tr>';
    }
    echo '</table>';
   } else {
     echo '<p>No properties found.</p>';
   }

   // Close the database connection
    
   ?>

<script>
function approveRequest(requestId) {
    if (confirm('Are you sure you want to approve this request?')) {
        window.location.href = 'approverent_request.php?request_id=' + encodeURIComponent(requestId);
    }
}

function deleteRequest(requestId) {
    if (confirm('Are you sure you want to delete this request?')) {
        window.location.href = 'rejectrent_request.php?request_id=' + encodeURIComponent(requestId);
    }
}
</script>
</body>
</html>