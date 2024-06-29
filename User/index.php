<?php

$title = 'Dashboard';
include('header.php');
include('_secure.php');
include('include/db.php');
include('include/function.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-archive"></i>
              </div>
              <div class="mr-5">
                <?php 
                  $GET_status = get_order_status_Count($_SESSION['User_id']); 
                  echo $GET_status->num_rows;
                ?>
                Order Detail!
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="user_order_detail.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        
      </div>
      <!-- Area Chart Example-->
     
      
      <!-- Example DataTables Card-->
      
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php');?>
  </div>
</body>

</html>
