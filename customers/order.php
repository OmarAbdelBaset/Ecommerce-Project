<?php
include "../general/config.php";
include '../shared UI/nav.php';
//echo "Hello World";
// if (isset($_GET['PID'])) {
//   echo $_GET['PID'];
// }

if (isset($_POST['BackBTN'])) {
  header("location:/ecommerce/index.php");
}
$CustID = $_SESSION['custID'];
$QueryFromCustomer = "SELECT * FROM customers WHERE ID = $CustID ";
$ExecuteQuery1 = mysqli_query($conn, $QueryFromCustomer);
$CustomerData = mysqli_fetch_assoc($ExecuteQuery1);
$CustomerEmail = $CustomerData['email'];
//echo $CustomerData['email'];
//-----------------------------------------------
$ProdID = $_GET['PID'];
$QueryFromProduct = "SELECT * FROM products WHERE ID = $ProdID ";
$ExecuteQuery2 = mysqli_query($conn, $QueryFromProduct);
$ProductData = mysqli_fetch_assoc($ExecuteQuery2);
$ProductName = $ProductData['name'];
$ProductPrice = $ProductData['price'];
if (isset($_POST['MakeOrder'])) {
  $PaymentMethod = $_POST['PaymentMethod'];
  $InsertToOrders = "INSERT INTO orders VALUES(NULL,$CustID,$ProdID,$ProductPrice,'$PaymentMethod')";
  $UpdateQuery="UPDATE products SET quantity = quantity - 1 WHERE ID = $ProdID";
  $ExecuteUpdateQuery= mysqli_query($conn , $UpdateQuery);
  $ExecuteInsertQuery = mysqli_query($conn, $InsertToOrders);
 

  print_message("Order Is Created Successfully", "normal");
  
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body style="background-color: #f5f4f4;">


  <!-- <form method="POST">
        <label for="">Product Name</label>
        <input type="text" disabled>
        <label for="">Customer Name</label>
        <input type="text" disabled>
        <label for="">Product's Price</label>
        <input type="text" disabled>
        <button type="submit" name="MakeOrder">Create Order</button>
        </form> -->


  <div class="container">

    <form method="POST">
      <h1 class="text-center text-info display-3"> Make Order </h1>
      <div class="form-group">
        <label for="exampleInputPassword1">Product Name</label>
        <input type="text" value="<?php echo $ProductName; ?> " class="form-control" id="exampleInputPassword1" name="name" disabled>
      </div>

      <div class="form-group">
        <label for="exampleInputPassword1">Customer Email</label>
        <input type="email" value="<?php echo $CustomerEmail; ?> " class="form-control" id="exampleInputPassword1" name="email" disabled>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product's Price</label>
        <input type="email" value="<?php echo $ProductPrice; ?> " class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" disabled>

        <div class="form-group">
    <label for="exampleFormControlSelect1">Payment way</label>
    <select class="form-control" id="exampleFormControlSelect1" name="PaymentMethod">
      <option>visa</option>
      <option>cash</option>
      <option>vodafone cash</option>
      
    </select>
  </div>
        <br>
        <button style="margin-top:20px;" type="submit" class="btn btn-info" name="MakeOrder">Create Order</button>
        <button style="margin-top:20px;" type="submit" class="btn btn-info" name="BackBTN">Back</button>


    </form>
  </div>


</body>

</html>