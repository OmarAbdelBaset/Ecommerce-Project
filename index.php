
<?php
include "../ecommerce/general/config.php";
include 'shared UI/nav.php';
//session_start();

// foreach ($_SESSION as $data) {
//   echo $data;
// }
$HasSearched = 0;

if (isset($_POST['SearchBTN'])) {
  $HasSearched = 1;
  $_SESSION['SEARCH'] = $_POST['SearchInput'];
}
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

<body style="background-color: #f5f4f4;">


  <form method="POST"  >
    <div class="form-group"  style="margin-top: 10px; width:500px; margin-left:450px;">
      <input type="text" class="form-control" name="SearchInput"  placeholder="Search Here" >
   
    <button type="submit" name="SearchBTN" class="btn btn-info pull-right" style="margin-left: 200px; margin-top: 5px ">Search</button>
    </div>
  </form>

  <!-- /////////////////////// -->
  <?php if ($HasSearched) : ?>
    <div class="row">
      <?php
      $Text = $_SESSION['SEARCH'];
      $SelectQuery = "SELECT * FROM  products WHERE name like '%$Text%'";
      $ExecuteQuery = mysqli_query($conn, $SelectQuery);
      $NUM  = mysqli_num_rows($ExecuteQuery);
      if ($NUM > 0) {
        // if($ExecuteQuery) echo "DONE";
        // else echo "NOOOOOOO";
        //$FetchQuery = mysqli_fetch_assoc($ExecuteQuery);
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
              <img src="./pic/<?php echo $ProductData['image'] ?>" class="card-img-top" alt="book" width="200" height="220">
              <div class="card-body" style="background-color: white; color: black; " >
                <h5 class="h5" class="card-title"><?php echo $ProductData['name'] ?></h5>
                <h5 class="h5" class="card-title">Price = <?php echo $ProductData['price'] ?></h5>
                <h5 class="h5" class="card-title"><?php echo $ProductData['author'] ?></h5>
                <h5 class="h5" class="card-title"><?php echo $SectionName ?></h5>
                <h5 class="h5" class="card-title"><?php echo $CompanyName ?></h5>
                </br>
                <?php if (isset($_SESSION['custID'])) : ?>
                  <a class="btnnnn" href="../ecommerce/customers/order.php?PID=<?php echo $ProductData['ID'] ?>" class="btn btn-light">buy</a>
                <?php else : ?>
                  <a class="btnnnn" href="../ecommerce/customers/logincustomer.php" class="btn btn-light">Log In</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
      <?php }
      } else print_message("This Book Is Not Found", "normal");
      ?>
    </div>

  <?php else : ?>
    <div class="row">
    
      <?php
      ///List Products
      $QueryFromProducts = "SELECT * FROM products";
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
        <div class="col" >
          <div class="card text-white bg-secondary mb-3 mt-3 " style="width: 18rem;" >
            <img src="./pic/<?php echo $ProductData['image'] ?>" class="card-img-top" alt="book" width="200" height="220">
            <div class="card-body" style="background-color: white; color: black; " >
              <h5 class="h5" class="card-title"><?php echo $ProductData['name'] ?></h5>
              <h5 class="h5" class="card-title">Price = <?php echo $ProductData['price'] ?></h5>
              <h5 class="h5" class="card-title"><?php echo $ProductData['author'] ?></h5>
              <h5 class="h5" class="card-title"><?php echo $SectionName ?></h5>
              <h5 class="h5" class="card-title"><?php echo $CompanyName ?></h5>
              </br>
              <?php if (isset($_SESSION['custID'])) : ?>
                <a class="btnnnn" href="../ecommerce/customers/order.php?PID=<?php echo $ProductData['ID'] ?>" class="btn btn-light">buy</a>
              <?php else : ?>
                <a class="btnnnn" href="../ecommerce/customers/logincustomer.php" class="btn btn-light">Log In</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php endif; ?>
</body>

</html>