<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="test.css">
	<title>Search Form</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<label for="search">Search:</label>
		<input type="text" id="search" name="search" placeholder="Search...">
		<input type="submit" value="Search">
	</form>

    <?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the search term from the form submission
$search_term = mysqli_real_escape_string($conn, $_POST['search']);

// Query to search the database
$sql = "SELECT * FROM stdata WHERE idno LIKE '%".$search_term."%'";
$result = mysqli_query($conn, $sql);

// Display the search results
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row["idno"] . "</p>";
    }
} else {
    echo "No results found.";
}

// Close the database connection
mysqli_close($conn);
?>
</body>
</html>