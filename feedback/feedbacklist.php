<?php 
include "../shared Admin/nav1.php";
include "../general/config.php";

$select= "SELECT * FROM `feedback`";
$s=mysqli_query($conn,$select);
if(isset($_GET['delete']))
{
    $dID = $_GET['delete'];
    $delete = "DELETE FROM `feedback` WHERE id= $dID";
    $d = mysqli_query($conn, $delete);
    if($d)
    {
        print_message("Feedback Has Been Deleted Successfully","normal");
    }
    else{
        print_message("Feedback Has Not Been Deleted, Please Try Again","danger");
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
    <div class="container col-7 text-center my-5 ">
    <table class=" table table-dark table-striped">
<thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Details</th>
            <th scope="col">Action</th>
          
          
        </tr>
</thead>
        <?php foreach($s as $data) { ?>
        <tbody>
        <tr>
            <td> <?php echo $data['ID'] ?> </td>
            <td> <?php echo $data ['details']?> </td>
            <td>
               <a href="feedbacklist.php?delete=<?php echo $data['ID'] ?>  " onclick="return confirm('are you sure?')" class="btn btn-danger"> Delete</a>
               
                
        </td>
       
        </tr>
        </tbody>
        <?php } ?>
    
    </table>
</div>
</body>
</html>
