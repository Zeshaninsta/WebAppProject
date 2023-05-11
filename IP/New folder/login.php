<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hospital Management System - Signup</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    h1 {
      text-align: center;
      padding: 20px;
      background-color: #337ab7;
      color: #fff;
    }
    form {
      margin-top: 50px;
      text-align: center;
    }
    label {
      display:-block;
      width: 100px;
      text-align: left;
    }
    input[type=text], input[type=password] {
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      margin-bottom: 10px;
      width: 300px;
    }
    input[type=submit] {
      padding: 10px;
      font-size: 16px;
      background-color: #337ab7;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Hospital Management System - Signup</h1>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Username:</label>
    <input type="text" name="username"><br>
    <label>Password:</label>
    <input type="password" name="password"><br>
    <input type="submit" name="submit" value="Signup">
  </form>

  <?php
    // establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hospital";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // retrieve user input from the form
      $username = $_POST['username'];
      $password = $_POST['password'];

      // check if the username already exists
      $sql = "SELECT * FROM patients WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        //echo "Error: Username already exists.";
        header('Location:new.html');
      } else {
        // construct the SQL query to insert data into the database
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO doctors (username, password) VALUES ('$username', '$password')";

        if (mysqli_query($conn, $sql)) {
          //echo "User created successfully.";
          header('Location:index.html');
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    }

    mysqli_close($conn);
  ?>
</body>
</html>