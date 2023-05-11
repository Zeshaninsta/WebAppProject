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

// Check if the user has provided a valid file id in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    // Get the file id from the URL
    $id = $_GET['id'];

    // Define a SQL query to select the file information and content from the database by id 
    $sql = "SELECT name, type, size, content FROM files WHERE id = '$id'";

    // Execute the query and get the result set 
    $result = $conn->query($sql);

    // Check if there is a matching file in the database 
    if ($result->num_rows > 0) {

        // Fetch the file information and content from the result set 
        list($name, $type, $size, $content) = mysqli_fetch_array($result);

        // Set the appropriate headers for downloading the file 
        header("Content-Disposition: attachment; filename=\"$name\"");
        header("Content-Type: $type");
        header("Content-Length: $size");

        // Print the file content 
        echo $content;

    } else {

        // Print an error message 
        echo "File not found.";

    }

} else {

    // Print an error message 
    echo "Invalid file id.";

}

// Close the connection to the database 
$conn->close();
?>