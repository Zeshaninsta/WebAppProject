<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM dorm");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <tr>
	    <td>ID</td>
		<td>username</td>
		<td>password</td>
		<td>dorm</td>
		<td>Action</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["password"]; ?></td>
		<td><?php echo $row["dorm"]; ?></td>
		<td><a href="update.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>