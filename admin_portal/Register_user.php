<?php
$title = 'Register User Record';
include('_secure.php');
include('header.php');
include('include/db.php');
include('include/function.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Register User</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-users"></i> Register User
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Username</th>
                  <th>Full name</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $USer = User_reg_fetch();
                $count = '0';
                while ($row = $USer->fetch_object()) {
                  $count++;
                ?>
                  <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $row->User_Name; ?></td>
                    <td><?php echo $row->Full_Name; ?></td>
                    <td><?php echo $row->Contact_No; ?></td>
                    <td><?php echo $row->Address; ?></td>
                    <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="Register_user.php?Register&ID=<?php echo $row->ID; ?>" class="btn btn-primary">Delete</a></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
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
