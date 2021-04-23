<?php
include "../shared Admin/nav1.php";
include "../general/config.php";

$select= "SELECT * FROM `customers`";
$s= mysqli_query($conn, $select);



?>
<html>
    <head></head>
    <body style="background-color: #f5f4f4;">
<div class="container col-7 text-center my-5 ">
    <table class=" table table-dark table-striped">
        <thead>

        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">phone</th>
            <th scope="col">Address</th>
        </tr>
        </thead>
        <?php foreach($s as $data) { ?>
        <tbody>
        <tr>
            <td> <?php echo $data['ID'] ?> </td>
            <td> <?php echo $data ['name']?> </td>
            <td> <?php echo $data['email'] ?> </td>
            <td> <?php echo $data['phone'] ?></td>
            <td> <?php echo $data['address'] ?></td>
        </tr>
        </tbody>
        <?php } ?>
    
    </table>
</div>
    </body>
</html>
