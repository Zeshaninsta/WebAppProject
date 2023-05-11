<?php
$con = mysqli_connect("localhost","root","","student");
$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$IDNO = $_POST['IDNO'];
$age = $_POST['age'];
$dorm = $_POST['dorm'];
$class_year = $_POST['clyear'];
// $message = $_POST['message'];
$update = "UPDATE `dorm` SET `first_name`='$first_name',`last_name`='$last_name',`IDNO`='$IDNO',`AGE`='$age',`dorm`='$dorm',`CLASS_YEAR`='$class_year' WHERE ID ='$id'";
//$update = "UPDATE `dorm` SET `AGE`='$age',`CLASS_YEAR`='$class_year' WHERE ID ='$id'";
$sql = mysqli_query($con,$update);

if($sql)
{
    echo "database updates successfully";
    header('Location:database.php');
}
else
{
    echo 'please try again';
}
mysqli_close($con);


?>