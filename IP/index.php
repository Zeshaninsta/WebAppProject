<?php
$conenction = mysqli_connect("localhost","root","","Phpclass");
// $sql = 'create table class(FirstName VARCHAR(50) PRIMARY KEY,
// LASTNAME VARCHAR(50) NOT NULL,
// EMAIL VARCHAR(30) NOT NULL,
// PASSWORD VARCHAR(30) NOT NULL  
// )';
$Val = "INSERT INTO class(FirstName,LASTNAME,EMAIL,PASSWORD) VALUES('EMRAN','MOHAMMED','IMRAN@GMAIL.COM','12344')";
$query = mysqli_query($conenction,$Val);
if($query)
{
    echo 'Data inserted successfully';
}
mysqli_close($conenction);
?>