<?php
include "../general/config.php";
include "../shared UI/nav.php";
?>

  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <style>
    .btnnnn {

      padding: 15px;
      background-color: #374045;
      border-radius: 25px;
      color: white;
      margin-left: 35%;
      margin-top: 20px;
    }

    .col {
      float: left;
    }
  </style>
</head>
<body >
    
<div class="row">

<?php
$QueryFromProducts = "SELECT * FROM products WHERE sectionID='7'";
$ExecuteQuery = mysqli_query($conn, $QueryFromProducts);
foreach ($ExecuteQuery as $ProductData) {
?>
  <?php
  $SectionID = $ProductData['sectionID'];
  $JoinSection = "SELECT sections.name FROM sections JOIN products ON sections.ID = $SectionID ";
  $ExcuteJoinSection = mysqli_query($conn, $JoinSection);
  $FetchSection = mysqli_fetch_assoc($ExcuteJoinSection);
  $CompanyID = $ProductData['companyID'];
  $JoinCompany = "SELECT partnershipcompany.name FROM partnershipcompany JOIN products ON partnershipcompany.ID = $CompanyID";
  $ExcuteJoinCompany = mysqli_query($conn, $JoinCompany);
  $FetchCompany = mysqli_fetch_assoc($ExcuteJoinCompany);
  $SectionName = $FetchSection['name'];
  $CompanyName = $FetchCompany['name'];
  ?>
  <div class="col">
    <div class="card text-white bg-secondary mb-3 mt-3 " style="width: 18rem;">
      <img src="../pic/<?php echo $ProductData['image'] ?>" class="card-img-top" alt="book" width="200" height="220">
      <div class="card-body" style="background-color: white; color: black; " >
        <h5 class="h5" class="card-title"><?php echo $ProductData['name'] ?></h5>
        <h5 class="h5" class="card-title"> Price =<?php echo $ProductData['price'] ?></h5>
        <h5 class="h5" class="card-title"><?php echo $ProductData['author'] ?></h5>
        <h5 class="h5" class="card-title"><?php echo $SectionName ?></h5>
        <h5 class="h5" class="card-title"><?php echo $CompanyName ?></h5>
        </br>
        <?php if (isset($_SESSION['custID'])) : ?>
          <a class="btnnnn" href="/ecommerce/customers/order.php?PID=<?php echo $ProductData['ID'] ?>" class="btn btn-light">buy</a>
        <?php else : ?>
          <a class="btnnnn" href="/ecommerce/customers/logincustomer.php" class="btn btn-light">Log In</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
<?php } ?>
</div>
      
</body>
</html>