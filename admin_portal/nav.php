<?php
$file = $_SERVER["SCRIPT_NAME"];
$break = explode('/', $file);
$pfile = $break[count($break) - 1];

$pos = strpos($pfile, 'index');
if ($pos !== false) $is_Dashboard = true;

$pos = strpos($pfile, 'Register_Services');
if ($pos !== false) $is_Register_Services= true;

$pos = strpos($pfile, 'Services_record.php');
if ($pos !== false) $is_Services_record= true;

$pos = strpos($pfile, 'order_Detail');
if ($pos !== false) $is_order_Detail= true;

$pos = strpos($pfile, 'Register_user');
if ($pos !== false) $is_Register_user= true;

$pos = strpos($pfile, 'Message-Info');
if ($pos !== false) $is_Message_Info= true;

$pos = strpos($pfile, 'change_password');
if ($pos !== false) $is_password_change= true;

$pos = strpos($pfile, 'expenses.php');
if ($pos !== false) $is_expenses= true;

$pos = strpos($pfile, 'total_summary.php');
if ($pos !== false) $is_total_summary= true;
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">Laundry | Admin</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item <?php echo(isset($is_Dashboard)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item <?php echo(isset($is_Register_Services)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Register Services">
          <a class="nav-link" href="Register_Services.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Services Type</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_Services_record)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Services Record">
          <a class="nav-link" href="Services_record.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Services add</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_Register_user)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Register User">
          <a class="nav-link" href="Register_user.php">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Register User</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_order_Detail)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Order Detail">
          <a class="nav-link" href="order_Detail.php">
            <i class="fa fa-fw fa-truck"></i>
            <span class="nav-link-text">Order Detail</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_expenses)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Pengeluaran">
          <a class="nav-link" href="expenses.php">
            <i class="fa fa-fw fa-money"></i>
            <span class="nav-link-text">Pengeluaran</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_total_summary)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Total Summary">
          <a class="nav-link" href="total_summary.php">
            <i class="fa fa-fw fa-calculator"></i>
            <span class="nav-link-text">Total Summary</span>
          </a>
        </li>

        <li class="nav-item <?php echo(isset($is_password_change)?'active' : '')?>" data-toggle="tooltip" data-placement="right" title="Change Password">
          <a class="nav-link" href="change_password.php">
            <i class="fa fa-fw fa-lock"></i>
            <span class="nav-link-text">Change Password</span>
          </a>
        </li>

      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto"> 
        <li class="nav-item">
          <a class="nav-link"  data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "logout" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
