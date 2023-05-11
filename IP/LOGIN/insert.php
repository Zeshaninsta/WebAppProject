<?php 
$connection = mysqli_connect("localhost","root","","student");
if(isset($_POST['submit']))
{
    // $first_name = $_POST['first_name'];
    // $last_name = $_POST['last_name'];
    // $idno = $_POST['idno'];
    // $dorm = $_POST['dorm'];
    // $age = $_POST['age'];
    // $clyear = $_POST['clyear']; 
    $username = $_POST['username'];
    $password = md5( $_POST['password']);
    $value  = "INSERT INTO teacher (username, password) VALUES('$username','$password')";

    $QUERY = mysqli_query($connection,$value);
    if($QUERY)
    {
        header('Location:insert.html');
        echo "Data inserted Successfully";
    }
    else
    {
        echo "please try again";
    }
}
mysqli_close($connection);


?>