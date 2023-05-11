<?php
    // establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // retrieve user input from the form
      $username = $_POST['username'];
      $password = md5( $_POST['password']);

      // check if the username already exists
      $sql = "SELECT * FROM teacher WHERE username='$username' and password='$password'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        //echo "Error: Username already exists.";
        header('Location:../Teacher/index.html');
      } else {
        // construct the SQL query to insert data into the database
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM stdata WHERE idno='$username' and password='$password'";

        if (mysqli_query($conn, $sql)) {
          //echo "User created successfully.";
          header('Location:../IT/index.html');
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
    }

    mysqli_close($conn);
  ?>