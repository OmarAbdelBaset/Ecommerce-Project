<?php 

include "../general/config.php";
include "../shared Admin/nav1.php";
$select= "SELECT * FROM `products`";
$s=mysqli_query($conn,$select);
if(isset($_GET['delete']))
{
    $pID = $_GET['delete'];
    $delete = "DELETE FROM `products` WHERE id= $pID";
    $d = mysqli_query($conn, $delete);
    if($d){
        print_message("Data Has Been Successfully Deleted","normal");
    }
    else{
        print_message("Data Has Not Been Deleted, Please Try Again","danger");
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
    <div class="container col-11 text-center my-5 ">
    <table class=" table table-dark table-striped">
<thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">price</th>
            <th scope="col">Author</th>
            <th scope="col">sectionID</th>
            <th scope="col">companyID</th>
            <th scope="col">Image</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          
          
        </tr>
</thead>
        <?php foreach($s as $data) { ?>
        <tbody>
        <tr>
            <td> <?php echo $data['ID'] ?> </td>
            <td> <?php echo $data ['name']?> </td>
            <td> <?php echo $data['price'] ?> </td>
            <td> <?php echo $data['author'] ?> </td>
            <td> <?php echo $data['sectionID'] ?> </td>
            <td> <?php echo $data['companyID'] ?> </td>
            <td> <?php echo $data['image'] ?> </td>
            <td> <?php echo $data['quantity'] ?> </td>
            <td>
               <a href="prolist.php?delete=<?php echo $data['ID'] ?>  " onclick="return confirm('are you sure?')" class="btn btn-danger"> Delete</a>
               <a href="addpro.php?edit=<?php echo $data['ID'] ?> " class="btn btn-primary"> Update</a>
                
        </td>
       
        </tr>
        </tbody>
        <?php } ?>
    
    </table>
</div>
</body>
</html>
