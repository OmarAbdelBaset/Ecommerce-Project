<?php
include "../shared Admin/nav1.php";
include "../general/config.php";

$select = "SELECT * FROM `partnershipcompany`";
$s = mysqli_query($conn, $select);
if (isset($_GET['delete'])) {
    $dID = $_GET['delete'];
    $delete = "DELETE FROM `partnershipcompany` WHERE id= $dID";
    $d = mysqli_query($conn, $delete);

    if ($d) {
        print_message("Data Has Been Successfully Deleted", "normal");
    } else {
        print_message("Data Has Not Been Deleted, Please Try Again", "danger");
    }
}
?>
<html>
    <head>
    </head>
    <body style="background-color: #f5f4f4;">
<div class="container col-7 text-center my-5 ">
    <table class=" table table-dark table-striped">
        <thead>
            <tr>

                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <?php foreach ($s as $data) { ?>
            <tbody>
                <tr>

                    <td> <?php echo $data['ID'] ?> </td>
                    <td> <?php echo $data['name'] ?> </td>
                    <td>
                        <a href="comlist.php?delete=<?php echo $data['ID'] ?>  " onclick="return confirm('are you sure?')" class="btn btn-danger"> Delete</a>
                        <a href="addcom.php?edit=<?php echo $data['ID'] ?> " class="btn btn-primary"> Update</a>

                    </td>

                </tr>
            </tbody>
        <?php } ?>

    </table>
</div>
    </body>
</html>