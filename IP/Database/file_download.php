<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
  <nav>
    <h1 class="Logo">IT</h1>
<ul>
    <li><a href="#">Home</a></li>
    <li><a href="#schdule">Schedule</a></li>
    <li><a href="#">Download</a></li>
    <li><a href="#">Feedback</a></li>
    <li><a href="#">Login</a></li>
</ul>
</nav>
</div>
<div class="books">
    <h1>BOOKS</h1>
<h1>DOWNLOAD FILES</h1>
</div>
    <style>
        *
        {
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        .books
        {
            display: flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            margin-top:20px;
            color : #4CAF50;
        }
       body {
    width: 100%;
    display: flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
    font-family: 'Roboto', sans-serif;
    background-color: #f1f1f1;
    text-align: center;
}
.container
  {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
  }
 nav
  {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    line-height: 40px;
    background-color: #4CAF50;
  } 
  nav ul
  {
      list-style: none;
      width: 100%;
      text-align: right;
      padding-right: 60px;
  }
  nav ul li
  {
      display: inline-block;
      margin: 10px 20px;
  }
  nav ul li a
  {
      color: #fff;
      text-decoration: none;
  }

  .Logo
{
   width: 180px;
   cursor: pointer;
   font-family: 'poppins','san serif';
   color: #fff;
}
a
{
    margin-top : 3%;
    text-decoration : none;
    width:40%;
    background-color:#4CAF50;
    padding:20px;
    color : #fff;
    margin-bottom:20px;
}
    </style>
<?php
// You need to replace these values with your own database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT * FROM files";
$result = $conn->query($sql);

// Check if there are any files in the database 
if ($result->num_rows > 0) {

    // Loop through each row in the result set and print a link to download each file 
    while($row = $result->fetch_assoc()) {
        
        echo "<a href='download.php?id=" . $row["id"] . "' target='_blank'>" . $row["name"] . "</a>"; 

    }

} else {

    // Print a message 
    echo "No files found in the database.";

}

// Close the connection to the database 
$conn->close();
?>
</body>
</html>