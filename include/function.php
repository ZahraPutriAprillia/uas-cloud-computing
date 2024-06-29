<?php
// Include the database connection file
include('db.php');

// Function to fetch all menu records (assuming 'services_uploade' is the menu table)
function menu_record() {
    global $db;
    $query = "SELECT * FROM services_uploade";
    $result = $db->query($query);

    if ($result === false) {
        echo "Error: " . $db->error;
        return null;
    }

    return $result;
}

// Function to get menu count (assuming 'services_uploade' is the menu table)
function get_menu_Count() {
    global $db;
    $query = "SELECT COUNT(*) as total FROM services_uploade";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    return $row['total'];
}

// Function to get total user registration
function Total_user_reg() {
    global $db;
    $query = "SELECT COUNT(*) as total FROM user_registration";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    return $row['total'];
}

// Function to get order status count (Pending orders)
function get_order_status_Count() {
    global $db;
    $query = "SELECT * FROM order_detail WHERE Delivery_status = 'Pending'";
    $result = $db->query($query);

    if ($result === false) {
        echo "Error: " . $db->error;
        return null;
    }

    return $result;
}
?>
