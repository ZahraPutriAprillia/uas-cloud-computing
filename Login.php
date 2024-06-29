<?php 
include('include/Connection.php');

session_start(); // Pindahkan session_start ke bagian atas

// Inisialisasi variabel username dan password sebagai string kosong
$username = '';
$password = '';

if(isset($_POST['login'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Query to check if the username and password are correct
    $sel = "SELECT * FROM user_login WHERE User_Name='$username' AND Password='$password'";
    $info = $db->query($sel);
    $row = $info->fetch_object();

    if($info->num_rows > 0) {
        $valid = true;
        $_SESSION['USER_Portal'] = true;
        $_SESSION['User_id'] = $row->ID;
        $_SESSION['User_NAME'] = $row->User_Name;
        $_SESSION['Contact_No'] = $row->Contact_No;
        header("location:User/index.php");
        exit();
    } else {
        $valid = false;
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LAUNDRY MAMA ITA! Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    .modal-header, h4, .close {
        background-color: #5cb85c;
        color: white !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-footer {
        background-color: #f9f9f9;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <?php if(isset($valid) && $valid == false) { ?>
            <div class="alert alert-danger">
              Invalid Username or Password
            </div>
          <?php } ?>
          <form role="form" method="post" action="">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" autocomplete="off" required placeholder="Enter username" value="">
            </div>
            <div class="form-group">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" autocomplete="off" required placeholder="Enter password" value="">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <button type="submit" name="login" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <p>Not a member? <a href="Registration.php">New Registration</a></p>
        </div>
      </div>
    </div>
  </div> 
</div>

<script type="text/javascript">
  $(window).on('load', function(){
      $('#myModal').modal('show');
  });

  $('#myModal').modal({
      backdrop: 'static',   // This disable for click outside event
      keyboard: true        // This for keyboard event
  });
</script>
</body>
</html>

