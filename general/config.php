<?php 

$host="localhost";
$username="root";
$password="";
$db="ecommerce";
$conn=mysqli_connect($host , $username , $password , $db);

function print_message($text,$state){
    if($state == 'normal')
    echo "<div style='text-align:center;' class = 'alert alert-primary' role = 'alert' >". $text . "</div>";
    else if($state == 'danger')
    echo "<div style='text-align:center;' class = 'alert alert-danger' role = 'alert' >". $text . "</div>";
    
    }

?>