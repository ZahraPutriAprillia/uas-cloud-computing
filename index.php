<?php
include('include/Connection.php');

if(isset($_POST['Formsubmit'])){
    $Name = $_POST['Name'];
    $Phone_No = $_POST['Phone_No'];
    $Message = $_POST['Message'];

    // Query untuk memeriksa apakah data kontak sudah ada di database
    $sql = "SELECT * FROM contact_form WHERE Name='$Name' AND Phone_No='$Phone_No' AND Message='$Message'";
    $info = $db->query($sql);

    // Jika data kontak sudah ada, tidak lakukan apa-apa
    if($info->num_rows > 0) { 
        // Tidak ada tindakan yang diambil jika data kontak sudah ada
    } else {
        // Jika data kontak belum ada, masukkan ke dalam database
        $insert = "INSERT INTO contact_form (Name, Phone_No, Message) VALUES ('$Name', '$Phone_No', '$Message')";
        $query1 = $db->query($insert);
    }    
}
?>

<!DOCTYPE html>
<html>
<head>
<title>LAUNDRY MAMA ITA</title>

<link rel="icon" href="icon.png"> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Immerse a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/owl.carousel.css" rel="stylesheet">
<link rel="stylesheet" href="css/lightbox.css">
 <link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />


<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="//fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Sintony:400,700&amp;subset=latin-ext" rel="stylesheet">

</head>
<style type="text/css">
  /* Social Icons */
#social_side_links {
  position: fixed;
  top: 340px;
  left: 0;
  padding: 0;
  list-style: none;
  z-index: 99;
}

#social_side_links li a {display: block; padding: 5px 5px 5px 5px; }

</style>



<!-- <div class="icon-bar">
  <a href="#" class="facebook" data-toggle="modal" data-target="#myModal1">Order Now<i class="fa fa-order"></i></a> 
</div> -->
<!-- banner -->
<div class="w3l_banner" >

<div class="w3_bandwn">
<div class="container">
	<div class="col-md-3 w3_l">
	<i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:mamaita@gmail.com">mamaita@gmail.com</a>
	</div>
	<div class="col-md-6 w3_c">
	<i class="fa fa-phone" aria-hidden="true"></i> +62 789 889 234
	</div>
	<div class="col-md-3 w3_r">
	<a href="https://facebook.com" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
	<a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
	<a href="https://twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
	</div>
    <div class="clearfix"></div>
</div>
</div>
<nav class="navbar navbar-default ">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <h1><a class="navbar-brand" href="#">LAUNDRY MAMA ITA</a></h1>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li><a href="#index.html" class="page-scroll">HOME</a></li>
			<li><a href="#about" class="page-scroll">ABOUT</a></li>
			<li><a href="Login.php">LOGIN</a></li>
			<li><a href="Registration.php">REGISTRATION</a></li>
			<li><a href="admin_portal/login.php">ADMIN</a></li>
		</ul>
</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="w3l_bandwn">
 <h2>Welcome to Laundry MAMA ITA</h2>
 <div class="about-p text-center">
<span class="sub-title"></span>
<span class="fa fa-star" aria-hidden="true"></span>
<span class="sub-title"></span>
</div>
<h3>Kilau Bersih, Kenyamanan Tiada Henti</h3>
<div class="agile_dwng">
  </div>

</div>
 </div>
</div>
<!-- /features -->
<div class="about" id="about">
	<div class="features" id="features">
		<div class="container">
	<h3>About Us</h3>
			<div class="tittle_head_w3Our customer service executives are specially trained to provide guidance and ensure timely workmanship.</p>
			</div>
			<div class="inner_sec_info_agileits_w3">
				<div class="w3_banup">
					<div class="col-md-4 w3_ret">
						<div class="col-md-10 w3_txt">
							<h4>mencuci</h4>
							<p>"Cuci Lebih Bersih, Hidup Lebih Gembira"</p>
						</div>
						<div class="col-md-2 w3ls_ic">
							<i class="fa fa-crosshairs" aria-hidden="true"></i>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-10 w3_txt">
							<h4>kering</h4>
							<p>"Keringkan dengan Kelembutan, Nikmati dengan Kepuasan"</p>
						</div>
						<div class="col-md-2 w3ls_ic">
							<i class="fa fa-assistive-listening-systems" aria-hidden="true"></i>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-10 w3_txt">
							<h4>membersihkan</h4>
							<p>"Ketika Kebersihan adalah Kunci Kesejahteraan"</p>
						</div>
						<div class="col-md-2 w3ls_ic">
							<i class="fa fa-tint" aria-hidden="true"></i>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-4 w3l_mid">
						<div class="bulb">
							<img src="images/pic.jpg" alt="" />
						</div>
					</div>
					<div class="col-md-4 wthree_r">
						<div class="col-md-2 w3ls_ic">
							<i class="fa fa-street-view" aria-hidden="true"></i>
						</div>
						<div class="col-md-10 w3_txt">
							<h4>Harum</h4>
							<p class="move">"Aroma Kepercayaan, Aroma Kualitas"</p>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-2 w3ls_icr">
							<i class="fa fa-fast-forward" aria-hidden="true"></i>
						</div>
						<div class="col-md-10 w3_txt">
							<h4>Cepat</h4>
							<p class="move">"Cepat, Tepat dan Berkualitas Tinggi"</p>
						</div>
						<div class="clearfix"></div>
						<div class="col-md-2 w3ls_icr">
							<i class="fa fa-bolt" aria-hidden="true"></i>
						</div>
						<div class="col-md-10 w3_txt">
							<h4>tepat waktu</h4>
							<p class="move">"Waktu adalah Emas, Kami Menghargainya dengan Pelayanan Tepat Waktu"</p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- //features -->
</div>
</div>
<!-- Modal -->
<div id="myModal1" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<?php include('order-model.php');?>
			</div>
		</div>
	</div>
</div>
<!-- //footer -->
<div class="copyright">
	<div class="container">
		<p>© <?php echo date('Y');?> Laundry MAMA ITA <a href="">muti & zahra</a></p>
	</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.easing.min.js"></script>
<script src="js/move-top.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/grayscale.js"></script>
<script src="js/SmoothScroll.min.js"></script>
<!-- flexSlider -->
<script src="js/owl.carousel.js"></script>
<script>
	$(document).ready(function() {
		$("#owl-demo").owlCarousel({
			items : 2,
			itemsDesktop : [800,2],
			itemsDesktopSmall : [414,1],
			lazyLoad : true,
			autoPlay : true,
			navigation : true,
			navigationText : false,
			pagination : true,
		});
	});
</script>
<!-- //flexSlider -->
<!-- gallery -->
<script src="js/jquery.tools.min.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/jquery.cm-overlay.js"></script>
<script>
	$(document).ready(function () {
		$('.cm-overlay').cmOverlay();
	});
</script>
<!-- //gallery -->
<!-- Move-to-top-->
<script type="text/javascript">
    $(document).ready(function() {
        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear' 
        };
        $().UItoTop({ easingType: 'easeOutQuart' });
    });
</script>
<!--/Move-to-top-->
</body>
</html>

