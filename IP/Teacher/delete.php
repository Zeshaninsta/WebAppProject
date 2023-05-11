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
    <!-- <h1>Student Database</h1> -->
    <div class="login">
  <div class="login-box">
    <div class="log">
      <img src="../Assest/icons/log.png" alt="">
  </div>
    <h1>IDNO</h1>
    <form method="post" action="">
      <input type="text" id="IDNO" name="IDNO" placeholder="UGR/12345/13" required>
      <button type="submit" name="submit">GO</button>
    </form>
    <div class="loader"></div>
  </div>
  <div class="overlay"></div>
</div>
<?php
$conn = mysqli_connect("localhost", "root", "", "student");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['submit']))
{
$IDNO = $_POST['IDNO'];
$search = mysqli_real_escape_string($conn, $IDNO);
//$sql = "SELECT `ID`, `first_name`, `last_name`, `IDNO`, `AGE`, `dorm`, `CLASS_YEAR` FROM `dorm` WHERE IDNO = '$IDNO'";
//$sql = "SELECT * FROM dorm WHERE IDNO LIKE '%$search%'";
$sql = "DELETE FROM dorm WHERE IDNO = '$search'";
$query = mysqli_query($conn,$sql);
if($query)
{
    echo "Data of '$search' Deleted Successfully";
}
else
{
    echo "please try again";
}
}
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
    line-height: 20px;
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

h1,
h2,
h3 {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-style: normal;
    color : #4CAF50;
    margin-top:2%;
    margin-bottom:20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    text-transform:uppercase;
    margin-left:auto;
    margin-right:auto;
    background-color:#fff;
}


thead th {
    position: sticky;
    top: 0;
    background-color: #4CAF50;
    color: #4CAF50;
    font-size: 15px;
}

th,
td {
    border-bottom: 1px solid #dddddd;
    padding: 10px 20px;
    font-size: 14px;
    background: #4CAF50;
}

tr:nth-child(even) {
    background-color: #dddddd;
}

tr:nth-child(odd) {
    background-color: #edeef1;
}

tr:hover td {
    color: #44b478;
    cursor: pointer;
    background-color: #ffffff;
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





 
.login-box {
    background: #fff;
    width: 400px;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    position: relative;
    overflow: hidden;
    margin-top:10%;
    margin-bottom:10%;
  }
  .log img
  {
    width: 100px;
  }
  
  h1 {
    font-size: 32px;
    margin : 30px;
  }
  
  form {
    margin-top: 20px;
  }
  
  label {
    display: block;
    margin-bottom: 8px;
    color: #666;
  }
  
input {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    border: none;
    padding: 10px;
    border-radius: 20px;
    outline: none;
    margin-bottom: 20px;
    background-color: #e0e0e0;
    text-align: center;
    transition: 0px 0px 0px transparent;
  }
  
  
  button[type="submit"] {
    display: block;
    width: 70%;
    padding: 10px;
    border-radius: 5px;
    margin-left: auto;
    margin-right: auto;
    border: none;
    background: #4CAF50;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.2s ease;
  }
  
  button[type="submit"]:hover {
    background: #3e8e41;
  }
  
  .loader {
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    animation: spin 1s linear infinite;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    z-index: 1;
    display: none;
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.8);
    display: none;
    z-index: 999;
  }
  
  .overlay.active {
    display: block;
  }














</style>
</body>
</html>