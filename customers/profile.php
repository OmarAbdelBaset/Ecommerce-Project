<?php
//ob_start();
include "../shared UI/nav.php";
include "../general/config.php";


// if($conn) echo "YES";

if (isset($_GET['Delete'])) {
    $CID = $_SESSION['custID'];
    echo $CID;
    $DeleteQueryOrder = "DELETE FROM orders WHERE id_customer = $CID";
    $DeleteQuerycCustomer = "DELETE FROM customers WHERE ID = $CID";
    $ExcuteDeleteOrderQuery = mysqli_query($conn, $DeleteQueryOrder);
    $ExcuteDeleteCustomerQuery = mysqli_query($conn, $DeleteQuerycCustomer);
    if ($ExcuteDeleteCustomerQuery) {
        session_unset();
        session_destroy();
        header("location:/ecommerce/index.php");
        echo print_message("Your Account Is Deleted Successfully", "danger");
    } else echo print_message("Failed, Please Try Again", "danger");
}
//ob_end_flush();
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


    <div class="container col-10 text-center my-5 ">
        <table class=" table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>


                <?php
                $custID = $_SESSION['custID'];
                $CustomerQuery = "SELECT * FROM `customers` WHERE ID = $custID";
                $ExecuteQuery1 = mysqli_query($conn, $CustomerQuery);
                foreach ($ExecuteQuery1 as $data) { ?>
                <tbody>

                    <tr>
                        <td> <?php echo $data['ID'] ?> </td>
                        <td> <?php echo $data['name'] ?> </td>
                        <td> <?php echo $data['email'] ?> </td>
                        <td> <?php echo $data['phone'] ?></td>
                        <td> <?php echo $data['address'] ?></td>
                        <td> <?php echo $data['password'] ?></td>
                        <td> <a href="/ecommerce/customers/profile.php?Delete=<?php echo $data['ID']; ?>" class="btn btn-danger" onclick="return confirm('are you sure?')"> Delete </a></td>
                        <td><a href="addcustomer.php?edit=<?php echo $data['ID'] ?>" class="btn btn-primary"> Update</a></td>
                        <td><a href="/ecommerce/customers/showOrder.php" class="btn btn-info"> Show  Order</a></td>
                    </tr>
                </tbody>
                <?php } ?>

        </table>
    </div>

</body>

</html>