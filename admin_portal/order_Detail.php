<?php
$title = 'Delivery Boy';
include('_secure.php');
include('header.php');
include('include/db.php');
include('include/function.php');

// Check if session is active before starting
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Hitung total pemasukan dari order dengan delivery_status 'deliver'
$totalIncomeQuery = "SELECT SUM(total_price) AS total_income FROM order_detail WHERE delivery_status = 'deliver'";
$totalIncomeResult = $db->query($totalIncomeQuery);
$total_income = 0;
if ($totalIncomeResult->num_rows > 0) {
    $totalIncomeRow = $totalIncomeResult->fetch_assoc();
    $total_income = $totalIncomeRow['total_income'];
}

// Simpan total_income ke dalam session
$_SESSION['total_income'] = $total_income;
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
        <li class="breadcrumb-item active">Order Status</li>
      </ol>

      <!-- Total Pemasukan -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-dollar"></i> Total Income
        </div>
        <div class="card-body">
          <h5>Total Pemasukan: <?php echo "Rp " . number_format($total_income, 0, ',', '.'); ?></h5>
        </div>
      </div>

      <!-- Order Detail Table -->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-archive"></i> Order Detail
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
                  <th>Pick Up Date</th>
                  <th>Delivery Date</th>
                  <th>Total Price</th>
                  <th>Delivery Status</th>
                  <th>View Order</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $Show = get_order_status_Count_complete();
                $count1 = 0;
                while ($row = $Show->fetch_object()) {
                  $count1++;
                  $SID = $row->User_ID;
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
                    <td><?php echo "Rp " . number_format($row->Total_Price, 0, ',', '.'); ?></td>
                    <td><?php echo $row->Delivery_status; ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#exampleModalUser_Order<?php echo $count1; ?>" class="btn btn-primary">View</a>
                      <?php include('view_User_Order_detail.php'); ?>
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

  <!-- jQuery and Bootstrap JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

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
