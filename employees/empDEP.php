<?php 

include "../shared Admin/nav1.php";
include "../general/config.php";
$select="SELECT employees.name empname , departments.name depname FROM `employees` JOIN `departments` ON employees.depID = departments.ID";
$s= mysqli_query($conn,$select);

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
            <th scope="col">Employee Name</th>
            <th scope="col"> Department</th>
           
          
          
        </tr>
        </thead>
        <?php foreach($s as $data) { ?>
        <tbody>
        <tr>
            <td> <?php echo $data['empname'] ?> </td>
            <td> <?php echo $data ['depname']?> </td>
        
       
        </tr>
        </tbody>
        <?php } ?>
    
    </table>
</div>
</body>
</html>
