<?php
$title = 'Dashboard';
include('_secure.php');
include('header.php');
include('include/db.php');
include('include/function.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation -->
  <?php include('nav.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs -->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Menu Record</li>
      </ol>
      <!-- Icon Cards -->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-cutlery"></i>
              </div>
              <div class="mr-5"><?php echo get_menu_Count(); ?> Total Service Provide!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Register_Services.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"><?php echo Total_user_reg(); ?> User List!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="Register_user.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
      <!-- Area Chart Example -->
      <!-- Example DataTables Card -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i> Pending Order
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Order Code</th>
                  <th>Name</th>
                  <th>Phone Number</th>
                  <th>Address</th>
                  <th>Item Drop Date</th>
                  <th>Received Date</th>
                  <th>Total Price</th>
                  <th>Status</th>
                  <th>View Order</th>
                  <th>Status Update</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $Show = get_order_status_Count();
                $count1 = 0;
                while ($row = $Show->fetch_object()) {
                  $count1++;
                  $SID = $row->User_ID;
                  $USer_NAME = $row->User_Name;
                  $QR_code = $row->Order_Code;
                ?>
                  <tr>
                    <td><?php echo $count1; ?></td>
                    <td><?php echo $QR_code; ?></td>
                    <td><?php echo $row->User_Name; ?></td>
                    <td><?php echo $row->Phone_No; ?></td>
                    <td><?php echo $row->Address; ?></td>
                    <td><?php echo $row->Pick_up_date; ?></td>
                    <td><?php echo $row->Delivery_date; ?></td>
                    <td><?php echo "Rp " . number_format($row->Total_Price, 0); ?></td>
                    <td><?php echo $row->Delivery_status; ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1; ?>" class="btn btn-primary">View</a>
                      <?php include('view_User_Order_detail.php'); ?>
                    </td>
                    <td>
                      <a data-toggle="modal" data-target="#exampleModalchangestatus<?php echo $count1; ?>" class="btn btn-primary">Change Status</a>
                      <?php include('order_status_Update.php'); ?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
    <!-- /.content-wrapper -->
    <?php include('footer.php'); ?>
  </div>

  <!-- Include Modals -->
  <!-- Modal to View Order Detail -->
  <?php
  $Show = get_order_status_Count();
  $count1 = 0;
  while ($row = $Show->fetch_object()) {
    $count1++;
    $SID = $row->User_ID;
    $USer_NAME = $row->User_Name;
    $QR_code = $row->Order_Code;
  ?>
    <div class="modal fade" id="exampleModalUser_Order<?php echo $count1; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalUser_OrderLabel<?php echo $count1; ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalUser_OrderLabel<?php echo $count1; ?>">Order Detail - <?php echo $QR_code; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Order Detail Content -->
            <p>User ID: <?php echo $SID; ?></p>
            <!-- Add other order details as needed -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- Modal to Change Order Status -->
  <?php
  $Show = get_order_status_Count();
  $count2 = 0;
  while ($row = $Show->fetch_object()) {
    $count2++;
    $SID = $row->User_ID;
    $USer_NAME = $row->User_Name;
    $QR_code = $row->Order_Code;
  ?>
    <div class="modal fade" id="exampleModalchangestatus<?php echo $count2; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalchangestatusLabel<?php echo $count2; ?>" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalchangestatusLabel<?php echo $count2; ?>">Change Status - <?php echo $QR_code; ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Form to Change Order Status -->
            <form action="process_status_update.php" method="post">
              <input type="hidden" name="order_id" value="<?php echo $QR_code; ?>">
              <div class="form-group">
                <label for="status">New Status:</label>
                <select class="form-control" id="status" name="status">
                  <option value="delivered">Delivered</option>
                  <!-- Add other status options as needed -->
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Update Status</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <!-- jQuery and Bootstrap JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "pageLength": 10 // Menampilkan 10 data per halaman
    });
  });
</script>

</body>
</html>

