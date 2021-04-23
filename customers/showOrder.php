<?php
include "../shared UI/nav.php";
include "../general/config.php";

$CID = $_SESSION['custID'];
$select="SELECT orders.price price , products.name proname FROM `orders` JOIN `products` ON orders.id_product = products.ID WHERE id_customer=$CID";
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
            <th scope="col">Products</th>
            <th scope="col">price</th>
           
        </tr>
        </thead>
        <?php foreach($s as $data) { ?>
        <tbody>
        <tr>
            <td> <?php echo $data['proname'] ?> </td>
            <td> <?php echo $data ['price']?> </td>
       
        </tr>
        </tbody>
        <?php } ?>
    
    </table>
</div>
</body>
</html>
