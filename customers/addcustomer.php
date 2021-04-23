<?php
ob_start();
include "../shared UI/nav.php";
include "../general/config.php";


if (isset($_POST['send'])) {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $insert = "INSERT INTO `customers` VALUES(NULL, '$name','$email','$phone','$address','$password')";
  $i = mysqli_query($conn, $insert);
  if($i){
    print_message("Your Account Is Created Successfully, Please Log In So You Can Buy Items","normal");
  }
  else{
    print_message("There's A Problem, Please Try Again","danger");
  }

}


$name = "";
$email = "";
$phone = "";
$address = "";
$password = "";
$update = false;

if (isset($_GET['edit'])) {
  $update = true;
  $id = $_GET['edit'];
  $select = "SELECT * FROM `customers` WHERE ID = $id";
  $s = mysqli_query($conn, $select);
  $row = mysqli_fetch_assoc($s);
  $name = $row['name'];
  $email = $row['email'];
  $phone = $row['phone'];
  $address = $row['address'];
  $password = $row['password'];
}
if (isset($_POST['update'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $UpdateQuery = "UPDATE `customers` SET name ='$name' , email ='$email' , phone ='$phone' , address ='$address' , password ='$password'  WHERE id = $id";
  $i = mysqli_query($conn, $UpdateQuery);
  if($i) print_message ("Updating Profile Is Completed Successfully","normal");
  else print_message ("Updating Profile Is Failed Please Try Again","danger");
}


ob_end_flush();
?>

<html>
  <head></head>
  <body style="background-color: #f5f4f4;">
    
 
<div class="container" style="width:500px;">

  <form method="POST">
    <h1 class="text-center text-info display-3"> Sign up </h1>
    <div class="form-group">
      <label for="exampleInputPassword1">Name</label>
      <input type="text" value="<?php echo $name ?>" class="form-control" id="exampleInputPassword1" name="name" placeholder="name">
    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Phone</label>
      <input type="number" value="<?php echo $phone ?>" class="form-control" id="exampleInputPassword1" name="phone" placeholder="phone">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" value="<?php echo $email ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email">

    </div>

    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" value="<?php echo $password ?>" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">

    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Address</label>
      <input type="text" value="<?php echo $address ?>" class="form-control" id="exampleInputPassword1" name="address" placeholder="address">

    </div>

   



    <?php if (!$update) : ?>
      <button type="submit" class="btn btn-info" name="send">Submit</button>
    <?php else : ?>
      <button type="submit" class="btn btn-info" name="update">Update</button>
    <?php endif; ?>

  </form>
</div>
  </body>
</html>