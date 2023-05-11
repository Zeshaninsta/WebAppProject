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
    <h1 class="std">Student Database</h1>
<?php
$conn = mysqli_connect("localhost", "root", "", "student");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM dorm";
$query = mysqli_query($conn,$sql);
echo "<table border='1'>";
echo "
    <th>ID</th>
    <th>FIRST NAME</th>
    <th>LAST NAME</th>
    <th>IDNO</th>
    <th>AGE</th>
    <th>DORM</th>
    <th>CLASS YEAR</th>
    <th>UPDATE</th>";
    while($row = mysqli_fetch_array($query))
    {
        echo "<tr>";
        echo "<td>".$row['ID']."</td>";
        echo "<td>".$row['first_name']."</td>";
        echo "<td>".$row['last_name']."</td>";
        echo "<td>".$row['IDNO']."</td>";
        echo "<td>".$row['AGE']."</td>";
        echo "<td>".$row['dorm']."</td>";
        echo "<td>".$row['CLASS_YEAR']."</td>";
        
        echo "<td>"."<a href='update_dorm.html'>Update</a>"."</td>";
        "</td>";
        echo "</tr>";
    }
    echo "<br>";
echo "</table>";
$conn->close();
?>
<style>
/* @import url('https://fonts.googleapis.com/css2?family=Roboto:@1&display=swap'); */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    width: 100%;
    display: block;
    justify-content: center;
    font-family: 'Roboto', sans-serif;
    background-color:  #f1f1f1;
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
      background:none;
  }

  .Logo
{
   width: 180px;
   cursor: pointer;
   font-family: 'poppins','san serif';
   color: #fff;
}
.std
{
    margin:20px;
}
h1,
h2,
h3 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-style: normal;
}

table {
    width: 100%;
    border-collapse: collapse;
    text-transform:uppercase;
}


thead th {
    position: sticky;
    top: 0;
    background-color: black;
    font-size: 15px;
}

th,
td {
    border-bottom: 1px solid  #000;
    padding: 10px 20px;
    font-size: 14px;
    color:#fff;
}

tr:nth-child(even) {
    background-color:  #4CAF50;
}

tr:nth-child(odd) {
    background-color: #4CAF50;
}

tr:hover td {
    color: #fff;
    cursor: pointer;
    background-color: #000;
}

td button {
    border: none;
    padding: 7px 20px;
    border-radius: 20px;
    background-color: black;
    color: #e6e7e8;
}

::-webkit-scrollbar {
    width: 6px;
}

::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
    a
    {
        display:flex;
        justify-content:center;
        align-items:center;
        text-decoration:none;
        text-align:center;
        color:#fff;
        background:#588c7e;
        margin:right:auto;
    }
</style>
</body>
</html>