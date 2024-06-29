<?php
$title = 'Pemasukan';
include('header.php');
include('include/db.php');
include('include/function.php');
include('_secure.php');

// Handle form submission untuk menyimpan data pemasukan baru
if (isset($_POST['save'])) {
    $source = $_POST['source'];
    $amount = $_POST['amount'];

    // Query untuk menyimpan data pemasukan ke dalam tabel income
    $insertQuery = "INSERT INTO income (source, amount) VALUES ('$source', '$amount')";
    
    // Eksekusi query
    $insertResult = $db->query($insertQuery);
    
    // Check if insert was successful
    if ($insertResult) {
        // Redirect back to income.php or do something else
        header("Location: income.php");
        exit();
    } else {
        // Handle error if insert failed
        echo "Error: " . $db->error;
    }
}
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
                <li class="breadcrumb-item active">Pemasukan</li>
            </ol>

            <!-- Main content -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-dollar"></i> Input Pemasukan
                </div>
                <div class="card-body">
                    <!-- Form untuk input pemasukan baru -->
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="source">Sumber Pemasukan</label>
                            <input type="text" class="form-control" id="source" name="source" placeholder="Sumber Pemasukan" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Jumlah Pemasukan</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="Jumlah Pemasukan" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Include footer -->
        <?php include('footer.php'); ?>

    </div>
    <!-- /.content-wrapper -->

    <!-- Bootstrap core JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin.min.js"></script>

</body>
</html>
