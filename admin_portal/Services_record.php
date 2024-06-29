<?php
$title = 'Dashboard';
include('_secure.php');
include('header.php');
include('include/db.php');
include('include/function.php');

// Proses tambah data
if (isset($_POST['Add_ser'])) {
    extract($_POST);
    $insert = "INSERT INTO services_uploade (Services_Name, Services_Type, Dry_Price, Laundry_Price) 
               VALUES ('" . $Ser_Name . "', '" . $Ser_Type . "', '" . $Dry_Price . "', '" . $Laundry_Price . "')";

    $query = $db->query($insert);
    if ($query) {
        include('SMS/menu_add.php');
    }
}

// Proses hapus data
if (isset($_GET["SRVaction"])) {
    $sel = "DELETE FROM services_uploade WHERE Id = '" . $_GET["ID"] . "'";
    $objExecute = $db->query($sel);
    if ($objExecute) {
        include('SMS/Successful_Delete.php');
    }
    header("Location: Services_record.php");
    exit();
}

// Pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman default
$limit = 10; // Jumlah data per halaman
$start = ($page - 1) * $limit; // Indeks data awal untuk query LIMIT

// Ambil data dengan pagination
function Serv_record_with_pagination($start, $limit) {
    global $db;
    $query = "SELECT * FROM services_uploade LIMIT $start, $limit";
    return $db->query($query);
}

$total_records = $db->query("SELECT COUNT(*) as total FROM services_uploade")->fetch_assoc()['total'];
$total_pages = ceil($total_records / $limit);

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
        <li class="breadcrumb-item active">All Services Record</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-user"></i> Add New Services Upload
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="row">
              <div class="form-group col-lg-3">
                <label for="">Services Type</label>
                <select name="Ser_Type" class="form-control" required="">
                  <?php
                  $result = $db->query("SELECT * FROM services_type");
                  while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['Services_Name'] . "'>" . $row['Services_Name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-lg-3">
                <label for="">Name</label>
                <input type="text" class="form-control" name="Ser_Name" required="" placeholder="Enter Services Name">
              </div>
              <div class="form-group col-lg-3">
                <label for="exampleInputEmail1">Dry Price</label>
                <input type="number" class="form-control" name="Dry_Price" placeholder="Dry Price" required="">
              </div>
              <div class="form-group col-lg-3">
                <label for="exampleInputEmail1">Laundry Price</label>
                <input type="number" class="form-control" name="Laundry_Price" placeholder="Laundry Price" required="">
              </div>
              <div class="form-group col-lg-12">
                <input type="submit" class="form-control btn btn-primary" name="Add_ser">
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> All Services Record
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>NO</th>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Dry Price</th>
                  <th>Laundry Price</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $Show = Serv_record_with_pagination($start, $limit);
                $count = ($page - 1) * $limit;
                while ($row = $Show->fetch_object()) {
                    $count++;
                ?>
                <tr>
                  <th><?php echo $count; ?></th>
                  <th><?php echo $row->Services_Name; ?></th>
                  <td><?php echo $row->Services_Type; ?></td>
                  <td><?php echo "Rp " . number_format($row->Dry_Price, 0, ',', '.'); ?></td>
                  <td><?php echo "Rp " . number_format($row->Laundry_Price, 0, ',', '.'); ?></td>
                  <td>
                    <a onclick="return confirm('Are you sure you want to delete this entry?')" href="Services_record.php?SRVaction&ID=<?php echo $row->ID; ?>" class="btn btn-primary">Delete</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">
          <!-- Tampilkan navigasi pagination -->
          <ul class="pagination justify-content-center">
            <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
              <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
              </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
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
        "paging": false, // Disable pagination karena sudah menggunakan pagination manual
        "lengthChange": false, // Disable length change dropdown
        "searching": false, // Disable search box
        "ordering": true, // Enable ordering
        "info": false, // Disable table information display
        "autoWidth": false, // Disable auto-width
        "responsive": true // Enable responsiveness
      });
    });
  </script>

</body>
</html>
