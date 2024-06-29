<?php
 $title='Dashboard';
   include('header.php');
   
   include('_secure.php');
   include('include/db.php');
    include('include/function.php');?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php  include('nav.php');?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Menu List </li>
      </ol>
      <!-- Icon Cards-->
     
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-cutlery"></i> Service List </div>
        <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row">
             <div class="form-group col-lg-12">
                <label for="exampleInputEmail1">Select Service Type</label>
                <select class="form-control" name="Menu_Type"  id="Menu_Type" >
                    <option  hidden="">Select Service Type</option>
                       <?php $Show1=Serv_Type();
                $count='0';
                 while ($row=$Show1->fetch_object()) {
                   $count++;
                ?>
              <option value="<?php echo $row->Services_Name ?>"><?php echo $row->Services_Name ?></option>
                  <?php };?>
                    

                </select>
              </div>
              <div class="form-group col-lg-12" id="Result">
              </div>
        </div>
       </form> 
        </div>
       
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
      <?php include('footer.php');?>
    <script >
  
  $(document).ready(function(){     
      $("#Menu_Type").change(function(e){
          var Menu_Type1= $(this).val();
            $.ajax({
              type:'POST',
              url: 'ajax/Menu_data.php',
              data:'Menu_Type='+Menu_Type1,
              success:function(html)
              {
                $('#Result').html(html);
              }
            }); 
      });
    });


 // function submitPass(){
 //  var newPass1  = document.getElementById('total_Order').value;
 //  alert(newPass1);
 // }
  
</script> 
  </div>
</body>

</html>
