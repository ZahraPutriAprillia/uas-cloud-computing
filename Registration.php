<?php 
include('include/Connection.php');

if(isset($_POST['submit'])){
    $usrname = isset($_POST['usrname']) ? $_POST['usrname'] : '';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $contact_no = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';

    // Check if user already exists
    $sql = "SELECT * FROM user_registration WHERE User_Name='$usrname' AND Contact_No='$contact_no'";
    $info = $db->query($sql);

    if($info->num_rows > 0) { 
        $valid = 'Allready'; 
    } else {
        // Insert user registration data
        $insert = "INSERT INTO user_registration (User_Name, Full_Name, Password, Address, Contact_No) 
                   VALUES ('$usrname', '$fname', '$password', '$address', '$contact_no')";
        $query1 = $db->query($insert);

        // Insert user login data
        $insert1 = "INSERT INTO user_login (User_Name, Password, Contact_No) 
                    VALUES ('$usrname', '$password', '$contact_no')";
        $query = $db->query($insert1);

        if($query1 && $query){
            $valid = 'true';
        } else {
            
            $valid = 'false';
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laundry MAMA ITA! Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .modal-header, h4, .close {
            background-color: #5cb85c;
            color:white !important;
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
            <div class="modal-content">
                <div class="modal-header" style="padding:35px 50px;">
                    <h4><span class="glyphicon glyphicon-user"></span> Registration</h4>
                </div>
                <?php if(isset($valid) && $valid == 'false') { ?>
                    <div class="alert alert-danger">
                        Invalid Username or Password
                    </div>
                <?php } ?>
                <?php if(isset($valid) && $valid == 'true') { ?>
                    <div class="alert alert-success">
                        Registration Successfully
                    </div>
                <?php } ?>
                <?php if(isset($valid) && $valid == 'Allready') { ?>
                    <div class="alert alert-danger">
                        This User is Already Registered
                    </div>
                <?php } ?>       
                <div class="modal-body" style="padding:40px 50px;">
                    <form role="form" method="post" action="" autocomplete="off">
                        <fieldset>
                            <div class="form-group">
                                <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
                                <input type="text" class="form-control" id="usrname" required="" name="usrname" placeholder="Enter User Name" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="fname"><span class="glyphicon glyphicon-user"></span> Full Name</label>
                                <input type="text" class="form-control" id="fname" required="" name="fname" placeholder="Enter Full Name" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="password"><span class="glyphicon glyphicon-lock"></span> Password</label>
                                <input type="password" class="form-control" id="password" required="" name="password" placeholder="Enter Password" autocomplete="new-password">
                            </div>

                            <div class="form-group">
                                <label for="address"><span class="glyphicon glyphicon-home"></span> Address</label>
                                <input type="text" class="form-control" id="address" required="" name="address" placeholder="Enter Address" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="contact_no"><span class="glyphicon glyphicon-phone"></span> Phone No</label>
                                <input type="number" class="form-control" id="contact_no" required="" name="contact_no" placeholder="Enter Phone No" autocomplete="off">
                            </div>
                        </fieldset>
                        <div class="checkbox">
                            <label><input type="checkbox" value="" checked>Remember me</label>
                        </div>
                        <input type="submit" name="submit" class="form-control btn btn-success btn-block" value="Submit">
                    </form>
                </div>
                <div class="modal-footer">
                    <p><a href="index.php">Main website</a></p>
                    <p>Already Registered? <a href="Login.php">Login</a></p>
                </div>
            </div>
        </div>
    </div> 
</div>
<script type="text/javascript">
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });

    $('#myModal').modal({
        backdrop: 'static',   // This disable for click outside event
        keyboard: true        // This for keyboard event
    });
</script>
</body>
</html>
