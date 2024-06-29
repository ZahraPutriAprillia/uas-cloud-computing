<?php
$title = 'Total Summary';
include('header.php');
include('include/db.php');
include('_secure.php');

// Mulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Ambil total pengeluaran dari sesi (jika ada)
$total_expenses = isset($_SESSION['total_expenses']) ? $_SESSION['total_expenses'] : 0;

// Ambil total pemasukan dari sesi (yang disimpan dari order_Detail.php)
$total_income = isset($_SESSION['total_income']) ? $_SESSION['total_income'] : 0;

// Hitung pendapatan bersih
$net_income = $total_income - $total_expenses;
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
                <li class="breadcrumb-item active">Total Summary</li>
            </ol>

            <!-- Main content -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-dollar"></i> Total Summary
                </div>
                <div class="card-body">
                    <h5>Total Pemasukan: <?php echo "Rp " . number_format($total_income, 2); ?></h5>
                    <h5>Total Pengeluaran: <?php echo "Rp " . number_format($total_expenses, 2); ?></h5>
                    <h5>Jumlah Total Pendapatan: <?php echo "Rp " . number_format($net_income, 2); ?></h5>
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
