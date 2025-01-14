<?php
$title='Dashboard';
include('header.php');
include('_secure.php');
include('include/db.php');
include('include/function.php');

if(isset($_POST['Change'])) {
    $USER_ID = $_SESSION['User_id'];
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

    // Anda dapat langsung menggunakan password mentah tanpa hashing
    $update = "UPDATE user_login SET Password='$Password' WHERE ID='$USER_ID'";
    $info = $db->query($update);

    if($info) {
        include('SMS/Change_password.php');
        echo "<script>alert('Password changed successfully');</script>";
    } else {
        echo "<script>alert('Failed to change password');</script>";
    }
}
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Change Password</li>
      </ol>
      <!-- Icon Cards-->
      <div class="container">
        <div class="card card-login mx-auto mt-5">
          <div class="card-header">Change Password</div>
          <div class="card-body">
            <div class="text-center mt-4 mb-5">
              <h4>Change your Password?</h4>
            </div>
            <form action="" method="POST">
              <div class="form-group">
                <input class="form-control" type="password" name="Password" placeholder="Enter New Password">
              </div>
              <input type="submit" class="btn btn-primary btn-block" value="Change Password" name="Change">
            </form>
          </div>
        </div>
      </div>
      <!-- Area Chart Example-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <!-- Bootstrap core JavaScript-->
    <?php include('footer.php');?>
  </div>
</body>
</html>
