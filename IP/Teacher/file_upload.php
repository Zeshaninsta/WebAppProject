<html>
<head>
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
    line-height: 10px;
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
    margin-top : 5%;
    text-decoration : none;
    width:40%;
    background-color:#4CAF50;
    padding:20px;
    color : #fff;
}
/* You can add your own CSS styles here */
form {
  margin: 20px;
}

input[type=file] {
  padding: 50px;
  border: none;
  outline: none;
  /* Add some box-shadow for the file input */
  box-shadow: inset 0 1px 3px rgba(0,0,0,0.6);
}

input[type=submit] {
  padding: 10px;
  border: none;
  outline: none;
  background-color: #0099ff;
  color: white;
  cursor: pointer;
}

a {
  display: block;
  margin: 10px;
  text-decoration: none;
  color: #fff;
}
.up
{
    margin-top:20px;
    margin-bottom:20px;
    color: #4CAF50;
}

.delete-button {
    background-color:red; 
    color:white; 
    /* Add some border-radius for the delete button */
    border-radius:5px; 
}

/* Add some hover effects for the links and buttons */

input[type=submit]:hover, .delete-button:hover {
    background-color:#0066cc; 
    /* Add some transition for the button */
    transition:all .3s ease-in-out; 
}

/* Add some media queries for responsive design */
@media screen and (max-width :768px) {

   input[type=file], input[type=submit], .delete-button {
       width :100%; 
   }

}
</style>
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
    <div class="content">
        <div class="UP">
        <h1>UPLOAD FILES</h1>
        </div>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file" accept=".pdf,.doc,.docx,.txt">
<input type="submit" name="upload" value="Upload">
</form>
</div>
</div>
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

// Check if the user has clicked the upload button
if (isset($_POST['upload'])) {

    // Get the file information from the form
    $file_name = $_FILES['file']['name'];
    $file_type = $_FILES['file']['type'];
    $file_size = $_FILES['file']['size'];
    $file_tmp_name = $_FILES['file']['tmp_name'];

    // Check if the file is valid and not empty
    if ($file_name && $file_size > 0) {

        // Open the file in binary mode for reading
        $fp = fopen($file_tmp_name, 'rb');

        // Escape special characters in the file content
        $content = mysqli_real_escape_string($conn, fread($fp, filesize($file_tmp_name)));

        // Close the file handle
        fclose($fp);

        // Define a SQL query to insert the file information and content into the database
        // You need to replace 'table' with your own table name and create columns for name, type, size and content
        $sql = "INSERT INTO files (name, type, size, content) VALUES ('$file_name', '$file_type', '$file_size', '$content')";

        // Execute the query and check if it is successful
        if ($conn->query($sql) === TRUE) {

            // Print a success message
            echo "File uploaded successfully.";

        } else {

            // Print an error message
            echo "Error uploading file: " . $conn->error;

        }

    } else {

        // Print an error message
        echo "Invalid or empty file.";

    }

}

// Check if the user has clicked the delete button 
if (isset($_POST['delete'])) {

    // Get the file id from the form 
    $id = $_POST['id'];

    // Define a SQL query to delete the file from the database by id 
    // You need to replace 'table' with your own table name 
    $sql = "DELETE FROM files WHERE id = '$id'";

    // Execute the query and check if it is successful
    if ($conn->query($sql) === TRUE) {

        // Print a success message 
        echo "File deleted successfully.";

    } else {

        // Print an error message 
        echo "Error deleting file: " . $conn->error;

    }

}

// Define a SQL query to select all files from the database 
// You need to replace 'table' with your own table name 
$sql = "SELECT * FROM files";

// Execute the query and get the result set 
$result = $conn->query($sql);

// Check if there are any files in the database 
if ($result->num_rows > 0) {

    // Loop through each row in the result set and print a link to download each file and a button to delete each file  
    while($row = $result->fetch_assoc()) {
        
        echo "<a href='download.php?id=" . $row["id"] . "' target='_blank'>" . $row["name"] . "</a>"; 
        echo "<div class='container'>";
        echo "<div class='content'>";
        echo "<form action='' method='post'>";
        
		echo "<input type='hidden' name='id' value='" . $row["id"] . "'/>";
		
		echo "<input type='submit' name='delete' value='Delete' class='delete-button'>";
		
		echo "</form>";
		echo"</div>";
		echo"</div>";
    }
    
} else {

    // Print a message that there are no files in the database 
    echo "No files found.";

}

// Close the connection to the database 
$conn->close();
?>
</body>
</html>