<?php 
include "../general/config.php";
include "../shared Admin/nav1.php";




if(isset($_POST['login']))
{
  $name= $_POST['name'];
  $password = $_POST['password'];

  $select="SELECT * FROM `admins` WHERE name = '$name' and password = '$password' ";

  $s= mysqli_query($conn, $select);
    $row=mysqli_num_rows($s);
    
    if($row>0){
      $_SESSION['admins'] = $name;
     header("location:/ecommerce/welcome.php");
    } else {
      echo "<div style='text-align:center;' class = 'alert alert-danger' role = 'alert' >". "Not Admin" . "</div>";
    
    }
     

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-color: #f5f4f4;">
  
</div>
<div class="container col-5 mt-5 " >
<form method= "POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Name" >
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    <button type="submit" class="btn btn-info"  name= "login" >Login</button>
  
  
</form>
</body>
</html>


