<?php 
ob_start();
include "../shared Admin/nav1.php";
include "../general/config.php";

if(isset($_POST['send']))
{
    $name=$_POST['name'];
    $insert="INSERT INTO `departments` VALUES(NULL, '$name')";
    $i=mysqli_query($conn,$insert);
    header("location:/ecommerce/departments/deplist.php");

   
}


//edit pt
$name="";

$update= false;

if(isset($_GET['edit']))
{
  $update = true;
  $id = $_GET['edit'];
  $select ="SELECT * FROM `departments` WHERE id = $id";
  $s =mysqli_query($conn,$select);
  $row = mysqli_fetch_assoc($s);
  $name = $row ['name'];

}
if(isset($_POST['update']))
{
  $name= $_POST['name'];


$update1 = "UPDATE`departments` SET name ='$name'   WHERE id = $id";
        $i= mysqli_query($conn , $update1);
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



<form method="POST">
<h3 class=" text-info display-3" >Add Department</h3>
  <div class="form-group" >
    <label for="exampleInputEmail1" style="margin-right: 420px;">Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $name ?>" name="name" placeholder="Name">
  
  
  </div>
  <?php if($update): ?>
    <button type="update" class="btn btn-info" name="update" >Update </button>
  <?php else: ?>
  <button type="submit" class="btn btn-info" name="send" >Send </button>
  <?php endif ?>
</form>


</div>
</body>
</html>

