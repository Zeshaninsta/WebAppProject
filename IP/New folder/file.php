<html>
<head>
<style>
/* You can add your own CSS styles here */
form {
  margin: 20px;
}

input[type=file] {
  padding: 10px;
}

input[type=submit] {
  padding: 10px;
  background-color: green;
  color: white;
}

a {
  display: block;
  margin: 10px;
}
</style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file" accept=".pdf,.doc,.docx,.txt">
<input type="submit" name="upload" value="Upload">
</form>

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

// Define a SQL query to select all files from the database 
// You need to replace 'table' with your own table name 
$sql = "SELECT * FROM files";

// Execute the query and get the result set 
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