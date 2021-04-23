<?php include 'head.php';
session_start();
if (isset($_POST['logout'])) {
  session_unset();
  session_destroy();
  header("location:/ecommerce/index.php");
}

// This Nav Is For Customer
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  
    <a class="navbar-brand" href="/ecommerce/">
      <img src="/ecommerce/pic/sh.png" alt="" width="50" height="30">
    </a>
 

  <a href="/ecommerce" class="navbar-brand">BOOK VALUE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sections
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/sections/romance.php">Romance</a>
          <a class="dropdown-item" href="/ecommerce/sections/horror.php">Horror</a>
          <a class="dropdown-item" href="/ecommerce/sections/khyal.php">Fiction</a>
          <a class="dropdown-item" href="/ecommerce/sections/3'moud.php">Mystery</a>
          <a class="dropdown-item" href="/ecommerce/sections/falsafa.php">Philosophy</a>
          <a class="dropdown-item" href="/ecommerce/sections/maglat atfal.php">Children Magazine</a>
          <a class="dropdown-item" href="/ecommerce/sections/agtma3aya.php">Social</a>
          <a class="dropdown-item" href="/ecommerce/sections/religion.php">Religious</a>


      </li>
       
    </ul>

  
    <a class="navbar-brand" href="/ecommerce/welcome.php">
      <img src="/ecommerce/pic/aaa.png" alt="" width="50" height="30">
    </a>
    <!-- <form method="POST" class="d-flex"> -->
      

 
      <!-- <a href="/ecommerce/customers/addcustomer.php" class="btn btn-outline-info" type="submit">Sign up</a> -->
      <?php if (isset($_SESSION['custID'])) : ?>
        <form method="POST" class="d-flex">
         
          <a href="/ecommerce/customers/profile.php?custID<?php echo $_SESSION['custID']?>" class="btn btn-outline-info " style="margin-top: 15px;">Profile</a>
          <a href="/ecommerce/feedback/addfeedback.php" class="btn btn-outline-info" type="submit" style="margin-top: 15px;">Feedback</a>
          <button name="logout" class="btn btn-outline-danger " style="margin-top: 15px;" onclick="return confirm('are you sure?')">LogOut</button>
        </form>
      <?php else : ?>

        <a href="/ecommerce/customers/logincustomer.php" class="btn btn-outline-info ">Login</a>

      

      <?php endif; ?>
    <!-- </form> -->

  </div>
</nav>



<?php include 'script.php' ?>