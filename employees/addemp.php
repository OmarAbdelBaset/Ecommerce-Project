<?php 
ob_start();
include "../shared Admin/nav1.php";
include "../general/config.php";


if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $salary=$_POST['salary'];
    $depID=$_POST['depID'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $insert="INSERT INTO `employees` VALUES (null,'$name',$salary,$depID,$phone,'$email')";
    $i=mysqli_query($conn , $insert);
    header("location:/ecommerce/employees/emplist.php");
  

   
}


//edit part


$name="";
$salary="";
$depID="";
$phone="";
$email="";
$update= false;

if(isset($_GET['edit']))
{
  $update = true;
  $id = $_GET['edit'];
  $select ="SELECT * FROM `employees` WHERE id = $id";
  $s =mysqli_query($conn,$select);
  $row = mysqli_fetch_assoc($s);
  $name = $row ['name'];
 $salary = $row ['salary'];
 $depID = $row ['depID'];
 $phone = $row ['phone'];
 $email = $row ['email'];

}
if(isset($_POST['update']))
{
  $name= $_POST['name'];
  $salary = $_POST['salary'];
  $depID = $_POST['depID'];
  $phone= $_POST['phone'];
  $email = $_POST['email'];
  

 
$update1 = "UPDATE`employees` SET name ='$name' , salary = $salary , depID = $depID, phone = $phone, email = '$email' WHERE id = $id";
        $i= mysqli_query($conn , $update1);

      if($i){
        print_message("Data Has Been Successfully Updated","normal");
      }
      else{
        print_message("Data Has Not Been Updated, Please Try Again","danger");
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
  <div class="container" style="width:500px;">
<h3 class="text-center text-info display-3"> Add Employee </h3>

<form method="POST" >
  
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="name" name="name" value="<?php echo $name ?> ">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Salary</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="salary" name="salary" value="<?php echo $salary ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">department</label>
    <select class="form-control" id="exampleFormControlSelect1"  name="depID"  >
        <?php 
        $select="SELECT *FROM`departments`";
        $s=mysqli_query($conn,$select);
        foreach($s as $data){
            ?>

      <option value="<?php echo $data['ID']?>"> <?php echo $data['name'] ?> </option>
        <?php } ?>
    
    </select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="phone" name="phone" value="<?php echo $phone ?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email" value="<?php echo $email ?>"  >

  </div>

 <?php if($update):?> 
  <button type="update" class="btn btn-info" name="update">Update</button>
 <?php else: ?>
  <button  type="submit" class="btn btn-info" name="submit"> Send </button>
<?php endif ?> 
</body>
</html>










