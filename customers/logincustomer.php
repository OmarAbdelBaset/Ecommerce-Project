<?php
ob_start();
include "../shared UI/nav.php";
include "../general/config.php";


if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $select = "SELECT * FROM `customers` WHERE email='$email' and password='$password'";

  $s = mysqli_query($conn, $select);

  $row = mysqli_num_rows($s);
  $data = mysqli_fetch_assoc($s);
  if ($row > 0) {

    $_SESSION['custID'] = $data['ID'];
    $_SESSION['customers'] = $email;
    header("location:/ecommerce/index.php");
    //echo $data['ID'];
  } else {
    echo "<div style='text-align:center;' class = 'alert alert-danger' role = 'alert' >". "Wrong Data, Please Try Again" . "</div>";
    
  }

  //Deleted
  // if(isset($_POST['visa']))
  // {
  //   header("location:visa.php");
  // }


  


}

ob_end_flush();

?>
<html>
  <head></head>
  <body style="background-color: #f5f4f4;">

<div class="container" style="width:500px;">



  <form method="POST">
    <h1 class="text-center text-info display-3"> Log In </h1>
    <div class="form-group">
      <label for="exampleInputPassword1">Email</label>
      <input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="email">
    </div>

    


    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="password">
    </div>

    <!-- <div class="col-sm-10"> -->
      <!-- <div class="form-check">
        <input class="form-check-input" type="radio" name="cash" id="cash" value="option1">
        <label class="form-check-label" for="cash">Cash</label>
        <br>


        <input class="form-check-input" type="radio" name="visa" id="visa" value="option2">
        <label class="form-check-label" for="visa">Visa</label>
        <br>
      </div> -->
      <div>
      <button type="submit"  class="btn btn-info" name="login" >Login</button>
      
    
</div>
  <div style="margin-top:20px;">
      <a  href=http:/ecommerce/customers/addcustomer.php>Don't Have Account? Signup</a>
  </div>
  </form>
</div>
</body>
</html>
