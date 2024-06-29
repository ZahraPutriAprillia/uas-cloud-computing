<?php
$title = 'Confirmation Order';
include('header.php');

include('_secure.php');
include('include/db.php');
include('include/function.php');

// Ambil ID pengguna dari sesi yang sedang berlangsung
$user_id = $_SESSION['User_id'];

if (isset($_POST['User_submit'])) {
    // Proses pemrosesan data, misalnya menyimpan data ke database

    // Ambil ID order yang baru saja disimpan
    $order_id = // Ambil ID order yang baru saja disimpan dari database

    // Setelah pemrosesan data, arahkan pengguna ke halaman user_order_detail.php
    header("Location: user_order_detail.php?order_id=$order_id");
    exit; // Penting untuk menghentikan eksekusi skrip setelah mengarahkan pengguna
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
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active"> Order Status</li>
            </ol>
            <!-- Icon Cards-->

            <!-- Example DataTables Card-->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-cutlery"></i> Order Status
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Order Number</th>
                                                <th>Name</th>
                                                <th>Phone number</th>
                                                <th>Total Item</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Mengambil data order untuk pengguna yang sedang masuk
                                            $Get_Order_dtail = get_order_status_Count($user_id);
                                            $count = 0;
                                            if ($Get_Order_dtail->num_rows > 0) {
                                                while ($row = $Get_Order_dtail->fetch_object()) {
                                                    $count++;
                                            ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $row->Order_Code ?></td>
                                                        <td><?php echo $row->User_Name; ?></td>
                                                        <td><?php echo $row->Phone_No; ?></td>
                                                        <td><?php echo $row->Total_Item; ?></td>
                                                        <td><?php echo "Rp " . number_format($row->Total_Price, 0, ',', '.'); ?></td>
                                                        <td>
                                                            <?php if ($row->Delivery_status == 'Deliver') { ?>
                                                                <img src="images/deliver.png" width="100px">
                                                            <?php } else {
                                                                echo 'Waiting';
                                                            } ?>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <br>
            <!-- /.container-fluid-->
            <!-- /.content-wrapper-->
            <?php include('footer.php'); ?>
        </div>
</body>

</html>
