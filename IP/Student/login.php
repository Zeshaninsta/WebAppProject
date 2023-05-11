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
      $sql = "SELECT * FROM teacher WHERE username='$username'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
        //echo "Error: Username already exists.";
        header('Location:new.html');
      } else {
        // construct the SQL query to insert data into the database
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "SELECT * FROM stdata WHERE username='$username'";

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