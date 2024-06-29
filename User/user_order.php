<?php
$title = 'Dashboard';
include('header.php');
include('_secure.php');
include('include/db.php');
include('include/function.php');

// Mengambil data detail berdasarkan ID
$Data = get_detail($_GET['ID']);

if (isset($_POST['Confirm'])) {
    $_SESSION['User_NAME'];
    // Proses order bisa ditambahkan di sini
}
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php'); ?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Order</a>
        </li>
        <li class="breadcrumb-item active">Order Form</li>
      </ol>
      <!-- Order Form-->
      <div class="card card-login mx-auto mt-8">
        <div class="card-header">
          <i class="fa fa-cutlery"></i> Order Form
        </div>
        <div class="card-body">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-lg-12">
                <div class="col-lg-12">
                  <label for="exampleInputEmail1">Select Menu Type</label>
                  <input type="text" name="menu_type" disabled value="<?php echo $Data->Services_Type; ?>" class="form-control">
                </div>
                <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="menu" disabled value="<?php echo $Data->Services_Name; ?>" class="form-control">
                </div>
                <?php if ($Data->Dry_Price > 0) { ?>
                <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Dry Price (<?php echo $Data->Dry_Price; ?> Rp)</label>
                  <select name="Dry_Price" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                </div>
                <?php } ?>
                <?php if ($Data->Laundry_Price > 0) { ?>
                <div class="form-group col-lg-12">
                  <label for="exampleInputEmail1">Laundry Price (<?php echo $Data->Laundry_Price; ?> Rp)</label>
                  <input type="text" name="menu" disabled value="<?php echo $Data->Laundry_Price; ?>" class="form-control">
                </div>
                <?php } ?>
                <div class="form-group col-lg-12">
                    <label for="exampleInputEmail1">Total <?php echo $Data->Services_Name; ?></label>
                    <input type="number" class="form-control" required id="total_Order<?php echo $Order_Id?>" min="0">
                  </div>

                <div class="form-group col-lg-12">
                  <input type="submit" name="Confirm" value="Order" class="btn btn-primary form-control">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <br>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include('footer.php'); ?>
  </div>
</body>

</html>