<?php
ob_start();
include "../shared Admin/nav1.php";
include "../general/config.php";


if(isset($_POST['send']))
{
    $name= $_POST['name'];
    $price= $_POST['price'];
    $author= $_POST['author'];
    $sectionID= $_POST['sectionID'];
    $companyID= $_POST['companyID'];
    $image_name=$_FILES['image']['name'];
     $image_type=$_FILES['image']['type'];
     $image_tmp=$_FILES['image']['tmp_name'];
     $location="/ecommerce/pic/";
     $quantity=$_POST['quantity'];
     move_uploaded_file($image_tmp, $location . $image_name);


    

    $insert4="INSERT INTO `products` VALUES(NULL, '$name', $price, '$author', $sectionID, $companyID , '$image_name' , '$quantity')";
    $i4=mysqli_query($conn,$insert4);
    header("location:/ecommerce/products/prolist.php");

}

//edit pt
$name="";
$price="";
$author="";
$sectionID="";
$companyID="";
$image_name="";
$quantity="";

$update= false;

if(isset($_GET['edit']))
{
  $update = true;
  $id = $_GET['edit'];
  $select5 ="SELECT * FROM `products` WHERE ID= $id";
  $s5 =mysqli_query($conn,$select5);
  $row = mysqli_fetch_assoc($s5);
  $name = $row ['name'];
  $price = $row ['price'];
  $author = $row ['author'];
  $sectionID = $row ['sectionID'];
  $companyID = $row ['companyID'];
  $image_name=$row['image'];
  $quantity=$row['quantity'];
 

}
if(isset($_POST['update']))
{
  $name= $_POST['name'];
  $price= $_POST['price'];
  $author= $_POST['author'];
  $sectionID= $_POST['sectionID'];
  $companyID= $_POST['companyID'];
  $image_name=$_POST['image'];
  $quantity=$_POST['quantity'];


  
 


$update1= "UPDATE `products` SET name = '$name' , price = $price , author = '$author' , sectionID = $sectionID , companyID = $companyID , image = '$image_name' , quantity = '$quantity' WHERE ID = $id ";
$i=mysqli_query($conn, $update1);
if($i){
  print_message("Data Has Been Successfully Updated","normal");
}
else{
  print_message("Data Has Not Been  Updated, Please Try Again","danger");
}
     

}
ob_end_flush();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body style="background-color: #f5f4f4;">
  
<div class="container col-7 my-5 text-center" style="width:500px;">
<h3 class="text-center text-info display-3"> Add Product</h3>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1" style="margin-right: 420px;">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Name" value="<?php echo $name ?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1" style="margin-right: 420px;">Price</label>
    <input type="number" class="form-control" id="exampleInputEmail1"  name="price" placeholder="price" value="<?php echo $price?>">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1" style="margin-right: 420px;">Author</label>
    <input type="text" class="form-control" id="exampleInputEmail1"  name="author" placeholder="author" value="<?php echo $author?>"> 
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1" style="margin-right: 420px;">Quantity</label>
    <input type="number" class="form-control" id="exampleInputEmail1"  name="quantity" placeholder="quantity" value="<?php echo $quantity?>"> 
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1" style="margin-right: 400px;">sectionID</label>
    <select class="form-control" id="exampleFormControlSelect1" name="sectionID"  >
        <?php 
        $select="SELECT *FROM`sections`";
        $s=mysqli_query($conn,$select);
        foreach($s as $data){
            ?>

      <option value="<?php echo $data['ID']?>"> <?php echo $data['name'] ?> </option>
        <?php } ?>
    
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1" style="margin-right: 400px;" >CompanyID</label>
    <select class="form-control" id="exampleFormControlSelect1" name="companyID"  >
        <?php 
        $select1="SELECT *FROM`partnershipcompany`";
        $s1=mysqli_query($conn,$select1);
        foreach($s1 as $data1){
            ?>

      <option value="<?php echo $data1['ID']?>"> <?php echo $data1['name'] ?> </option>
        <?php } ?>
    
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1" style="margin-right: 420px;">Image</label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="image" >
  </div>

 
 

  <?php if($update): ?>
    <button type="update" class="btn btn-info" name="update" >update </button>
  <?php else: ?>
  <button type="submit" class="btn btn-info" name="send" >Send </button>
  <?php endif ?>
</form>


</div>
</body>
</html>



