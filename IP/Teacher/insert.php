<?php 
$connection = mysqli_connect("localhost","root","","student");
if(isset($_POST['submit']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $idno = $_POST['IDNO'];
    $age = $_POST['AGE'];
    $dorm = $_POST['dorm']; 
    $clyear = $_POST['CLASS_YEAR']; 
    $value  = "INSERT INTO dorm(first_name,last_name,IDNO,AGE,dorm,CLASS_YEAR) VALUES('$first_name','$last_name','$idno','$age','$dorm','$clyear')";
    //$value  = "INSERT INTO `schedule`(`Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`) VALUES ('$ip','$java','$cm','$adb','$mult')";
    $QUERY = mysqli_query($connection,$value);
    if($QUERY)
    {
        echo "Data inserted Successfully";
        header('Location:insert.html');
    }
    else
    {
        echo "please try again";
    }
}
mysqli_close($connection);


?>