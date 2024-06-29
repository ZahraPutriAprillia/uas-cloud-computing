<?php
$title = 'Pengeluaran';
include('header.php');
include('include/db.php');
include('include/function.php');
include('_secure.php');

// Mulai session jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Handle form submission untuk menyimpan data pengeluaran baru
if (isset($_POST['save'])) {
    // Ambil nilai dari form
    $item_names = $_POST['item_name'];
    $prices = $_POST['price'];
    $expense_dates = $_POST['expense_date'];

    // Loop untuk menyimpan setiap item pengeluaran
    for ($i = 0; $i < count($item_names); $i++) {
        $item_name = $db->real_escape_string($item_names[$i]);
        $price = $db->real_escape_string($prices[$i]);
        $expense_date = $db->real_escape_string($expense_dates[$i]);

        // Query untuk menyimpan data pengeluaran ke dalam tabel expenses
        $insertQuery = "INSERT INTO expenses (item_name, price, expense_date) VALUES ('$item_name', '$price', '$expense_date')";

        // Eksekusi query
        $insertResult = $db->query($insertQuery);

        // Check if insert was successful
        if (!$insertResult) {
            echo "Error: " . $db->error;
            exit();
        }
    }

    // Redirect back to expenses.php or do something else after all inserts
    header("Location: expenses.php");
    exit();
}

// Query untuk menampilkan daftar pengeluaran
$query = "SELECT * FROM expenses ORDER BY expense_date DESC";
$result = $db->query($query);

// Menghitung total pengeluaran dari hasil seluruh harga
$totalQuery = "SELECT SUM(price) AS total_expenses FROM expenses";
$totalResult = $db->query($totalQuery);
$total_expenses = 0;
if ($totalResult->num_rows > 0) {
    $total_row = $totalResult->fetch_assoc();
    $total_expenses = $total_row['total_expenses'];
}

// Simpan total pengeluaran dalam sesi
$_SESSION['total_expenses'] = $total_expenses;
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
                <li class="breadcrumb-item active">Pengeluaran</li>
            </ol>

            <!-- Main content -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-money"></i> Input Pengeluaran
                </div>
                <div class="card-body">
                    <!-- Form untuk input pengeluaran baru -->
                    <form method="POST" action="">
                        <div id="input_fields_wrap">
                            <div class="form-row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control" name="item_name[]" placeholder="Nama Barang" required>
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp</span>
                                        </div>
                                        <input type="text" class="form-control" name="price[]" placeholder="Harga" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <input type="datetime-local" class="form-control" name="expense_date[]" required>
                                </div>
                                <div class="col">
                                    <button class="btn btn-primary add_field_button">Tambah Barang</button>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="save">Simpan</button>
                    </form>
                </div>
            </div>

            <!-- Tabel untuk menampilkan daftar pengeluaran -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i> Daftar Pengeluaran
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($result->num_rows > 0) {
                                    $count = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$count}</td>";
                                        echo "<td>{$row['item_name']}</td>";
                                        echo "<td>Rp " . number_format($row['price'], 0, ',', '.') . "</td>";
                                        echo "<td>{$row['expense_date']}</td>";
                                        echo "</tr>";
                                        $count++;
                                    }
                                } else {
                                    echo "<tr><td colspan='4'>Tidak ada data pengeluaran.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Total Pengeluaran -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-money"></i> Total Pengeluaran
                </div>
                <div class="card-body">
                    <h5>Total: Rp <?php echo number_format($total_expenses, 0, ',', '.'); ?></h5>
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

    <script>
        $(document).ready(function() {
            var max_fields = 10; // Maximum input fields allowed
            var wrapper = $("#input_fields_wrap"); // Input fields wrapper
            var add_button = $(".add_field_button"); // Add button ID

            var x = 1; // Initial input field count
            $(add_button).click(function(e){ // On add input button click
                e.preventDefault();
                if(x < max_fields){ // Max input box allowed
                    x++; // Increment input field counter
                    $(wrapper).append('<div class="form-row mb-3"><div class="col"><input type="text" class="form-control" name="item_name[]" placeholder="Nama Barang" required></div><div class="col"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp</span></div><input type="text" class="form-control" name="price[]" placeholder="Harga" required></div></div><div class="col"><input type="datetime-local" class="form-control" name="expense_date[]" required></div><div class="col"><a href="#" class="btn btn-danger remove_field">Hapus</a></div></div>'); // Add input field
                }
            });

            $(wrapper).on("click",".remove_field", function(e){ // On remove input button click
                e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
            });
        });
    </script>

    <!-- Custom scripts for all pages -->
    <script src="js/sb-admin.min.js"></script>

</body>
</html>
