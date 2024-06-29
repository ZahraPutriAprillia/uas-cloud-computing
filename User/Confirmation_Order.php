<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$title = 'Confirmation Order';
include('header.php');
include('_secure.php');
include('include/db.php');
include('include/function.php');

// Delete order temp if action is set
if (isset($_GET["action"]) && isset($_GET["ID"])) {
    $order_id = $_GET["ID"];
    $delete_query = "DELETE FROM order_temp WHERE ID = '$order_id'";
    $delete_result = $db->query($delete_query);
    if ($delete_result) {
        header("Location: Confirmation_Order.php");
        exit;
    } else {
        $sms = 'Error deleting order';
    }
}

// Get user information
$info_User_Get = user_info();
$Phone_No = '';
$Address = '';

if ($info_User_Get && isset($info_User_Get->Contact_No)) {
    $Phone_No = $info_User_Get->Contact_No;
    $Address = $info_User_Get->Address;
}

// Process form submission
if (isset($_POST['User_submit'])) {
    $Order_Code = rand(10, 1000000);
    $USER_ID = $_SESSION['User_id'];
    $USER_Name = $_SESSION['User_NAME'];

    // Additional check for user info (redundant check removed)
    if ($info_User_Get && isset($info_User_Get->Contact_No)) {
        $Phone_No = $info_User_Get->Contact_No;
        $Address = $info_User_Get->Address;
    }

    // Check if order detail already exists
    $check_query = "SELECT * FROM order_detail WHERE Pick_up_date = '" . $_POST['Pickdate'] . "' 
                    AND Delivery_date = '" . $_POST['Deliverydate'] . "' 
                    AND Total_Item = '" . $_POST['Total_Item'] . "' 
                    AND Total_Price = '" . $_POST['Toatl_Price'] . "'";
    $check_result = $db->query($check_query);

    if ($check_result->num_rows <= 0) {
        // Update order_temp status and insert into order_detail
        $update_temp_query = "UPDATE order_temp SET Order_status = 'active', Order_code = '$Order_Code', Pick_Delivery_Status = '2' 
                             WHERE User_ID = '$USER_ID' AND Pick_Delivery_Status = '1'";
        $update_temp_result = $db->query($update_temp_query);

        $insert_detail_query = "INSERT INTO order_detail (User_ID, Order_Code, User_Name, Total_Item, Total_Price, 
                                Pick_up_date, Delivery_date, Phone_No, Address, Pick_up_status, Delivery_status)
                                VALUES ('$USER_ID', '$Order_Code', '$USER_Name', '$_POST[Total_Item]', '$_POST[Toatl_Price]', 
                                '$_POST[Pickdate]', '$_POST[Deliverydate]', '$Phone_No', '$_POST[Address]', 'No', 'No')";
        $insert_detail_result = $db->query($insert_detail_query);

        if ($insert_detail_result) {
            include('SMS/order_Send.php');
        }
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
                <li class="breadcrumb-item active">Confirm Your Order</li>
            </ol>
            <!-- Order Table -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-cutlery"></i> Confirm Your Order
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Service Name</th>
                                    <th>Type</th>
                                    <th>Dry</th>
                                    <th>Laundry</th>
                                    <th>Total Item</th>
                                    <th>Total Price</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $Get_Order = get_order_detail($_SESSION['User_id']);
                                $Toatl_Price = 0;
                                $count = 0;
                                $Total_Item_Overall = 0;

                                if ($Get_Order->num_rows > 0) {
                                    while ($row = $Get_Order->fetch_object()) {
                                        $count++;
                                        $Total_Item_Overall += $row->Total_Item;
                                        $Toatl_Laundry_Price = $row->Laundry_Price * $row->Total_Item;
                                        $Toatl_Dry_Price = $row->Dry_Price * $row->Total_Item;
                                        $Toatl_Price += $Toatl_Laundry_Price + $Toatl_Dry_Price;
                                ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $row->Services_Name; ?></td>
                                            <td><?php echo $row->Services_Type; ?></td>
                                            <td><?php echo $row->Dry_Price; ?></td>
                                            <td><?php echo $row->Laundry_Price; ?></td>
                                            <td><?php echo $row->Total_Item; ?></td>
                                            <td><?php echo "Rp " . number_format($Toatl_Laundry_Price + $Toatl_Dry_Price, 0, ',', '.'); ?></td>
                                            <td><a onclick="return confirm('Are you sure you want to delete this entry?')" href="Confirmation_Order.php?action&ID=<?php echo $row->ID; ?>" class="btn btn-primary">Delete</a></td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Bill Detail and Form -->
            <div class="row">
                <div class="card col-lg-6">
                    <div class="card-header">
                        <i class="fa fa-dollar"></i> Bill Detail
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Total Item</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><?php echo $Total_Item_Overall; ?></td>
                                        <td><?php echo "Rp " . number_format($Toatl_Price, 0, ',', '.'); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card col-lg-6">
                    <div class="card-header">
                        <i class="fa fa-pencil"></i> Fill Form
                    </div>
                    <div class="card-body">
                        <form action="Confirmation_Order.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="Toatl_Price" required class="form-control" value="<?php echo $Toatl_Price; ?>">
                                <input type="hidden" name="Total_Item" required class="form-control" value="<?php echo $Total_Item_Overall; ?>">
                            </div>
                            <div class="form-group">
                                <label>DROP</label>
                                <input type="date" name="Pickdate" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>DELIVER</label>
                                <input type="date" name="Deliverydate" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" name="Phone_No" required class="form-control" value="<?php echo $Phone_No; ?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="Address" required class="form-control" value="<?php echo $Address; ?>">
                            </div>
                            <?php if ($Get_Order->num_rows > 0) { ?>
                                <div class="form-group">
                                    <input type="submit" name="User_submit" class="btn btn-primary form-control" value="Submit">
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        <!-- /.content-wrapper -->
        <?php include('footer.php'); ?>
    </div>
    <!-- /#wrapper -->
</body>
</html>
