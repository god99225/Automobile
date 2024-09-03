<?php
$host ="localhost";
$username ='root';
$password ='';
$database ='autoservice';



$con = mysqli_connect("$host","$username","$password",$database);

if(!$con)
{
  header("Location:../error/db.php");
  die();
}
?>