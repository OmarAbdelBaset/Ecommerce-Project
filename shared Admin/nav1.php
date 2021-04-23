<?php include 'head1.php';

session_start();
if(isset($_POST['logout']))
{
  session_unset();
  session_destroy();
  header("location:/ecommerce/shared Admin/login.php");
  
}
 ?>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<a class="navbar-brand" href="/ecommerce/">
      <img src="/ecommerce/pic/sh.png" alt="" width="50" height="30">
    </a>
  <a href="/ecommerce/" class="navbar-brand" >BOOK VALUE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <?php if(isset($_SESSION['admins'])):?>
      <li class="nav-item active">
        <a class="nav-link" href="/ecommerce/feedback/feedbacklist.php">Feedback <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/ecommerce/customers/customerlist.php">Customers List <span class="sr-only">(current)</span></a>
      </li>    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Employees
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/employees/emplist.php">Employees List</a>
          <a class="dropdown-item" href="/ecommerce/employees/addemp.php">Add Employee</a>
          <a class="dropdown-item" href="/ecommerce/employees/empDEP.php">Employees & Departments</a>
        </div>
        
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Departments
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/departments/deplist.php">Department List</a>
          <a class="dropdown-item" href="/ecommerce/departments/adddep.php">Add Department</a>
        </div>
       
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/products/prolist.php">Products List</a>
          <a class="dropdown-item" href="/ecommerce/products/addpro.php">Add Product</a>
          <a class="dropdown-item" href="/ecommerce/products/proSEC.php">Product & Section</a>
        </div>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Sections
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/sections/seclist.php">Sections List</a>
          <a class="dropdown-item" href="/ecommerce/sections/addsec.php">Add Section</a>
        </div>

       
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Partnership Company
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/ecommerce/company/comlist.php">Company List</a>
          <a class="dropdown-item" href="/ecommerce/company/addcom.php">Add Company</a>
        </div>   
       
      </li>

    

    </ul>
 
<form method="POST" class="d-flex">
 
<button class="btn btn-outline-danger" name="logout" style="margin-top: 5px;" onclick="return confirm('are you sure?')"> Log Out </button>

<?php else:?>
    
  <a href="/ecommerce/shared Admin/login.php" class="btn btn-outline-info my-2 my-sm-0" style="margin-left: 1070px;">Login</a>
  

</form>
 

<?php endif ;?>

  </div>
</nav>

<?php include 'script1.php'?>