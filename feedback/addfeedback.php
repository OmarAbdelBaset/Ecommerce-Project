<?php

include "../shared UI/nav.php";
include "../general/config.php";

$CustID = $_SESSION['custID'];
$QueryFromCustomer = "SELECT * FROM customers WHERE ID = $CustID ";
$ExecuteQuery1 = mysqli_query($conn, $QueryFromCustomer);
$CustomerData = mysqli_fetch_assoc($ExecuteQuery1);
$CustomerEmail = $CustomerData['email'];

if(isset($_POST['send']))
{
  $email=$_POST['email'];
    $details=$_POST['details'];
    $insert="INSERT INTO `feedback` VALUES(NULL, '$details' )";
    $i=mysqli_query($conn,$insert);
   if($i){
    print_message("Thanks For Sharing Your Feedback","normal");
   }
   else{
    print_message("Your Feedback Has Not Been Sent, Please Try Again","danger");
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
  <div class="container col-7 my-5 text-center" style="width:500px;" >
<form method="POST">
 
<div class="mb-3">
 
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" value="<?php echo $CustomerEmail; ?>"name="email" disabled >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Details</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="details" placeholder="details" >
  </div>
 
  <button type="submit" class="btn btn-info" name="send">Send</button>
</form>

</div>

</body>
</html>

