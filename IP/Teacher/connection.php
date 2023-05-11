<?php
   $con=mysqli_connect("localhost","root","","student");
   if($con){
      echo "success";
   }
   else
   {
    echo "try";
   }
?>