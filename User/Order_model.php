<?php 
$Order_Id=$row->ID;
$Data=get_detail($Order_Id);
?>
<div id="myModal<?php echo $row->ID; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <div class=" card card-login mx-auto mt-8">
          <div class="card-header">
            <i class="fa fa-cutlery"></i> Order Form 
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-lg-12">
                <div class="form-group col-lg-12">   
                  <div id="Mor_Eve"></div>
                  <div class="col-lg-12"> 
                    <label for="exampleInputEmail1">Service Type</label>
                    <input type="text" id="Servies_type<?php echo $Order_Id?>" disabled="" value="<?php echo $Data->Services_Type; ?>" class="form-control">
                  </div>
                  <div class="form-group col-lg-12" >
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" id="Servies_name<?php echo $Order_Id?>" disabled="" value="<?php echo $Data->Services_Name; ?>" class="form-control">
                  </div>
                  <?php if($Data->Dry_Price > 0){?>
                    <div class="form-group col-lg-12">
                      <label for="exampleInputEmail1">Dry Price (<?php echo $Data->Dry_Price; ?> Rp)</label>
                      <select id="Dry_Price<?php echo $Order_Id?>"  class="form-control" >
                        <option value="<?php echo $Data->Dry_Price; ?>">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                  <?php }?>
                  <?php if($Data->Laundry_Price > 0){?>
                    <div class="form-group col-lg-12">
                      <label for="exampleInputEmail1">Laundry Price (<?php echo $Data->Laundry_Price; ?> Rp)</label>
                      <select id="Laundry_Price<?php echo $Order_Id?>" class="form-control" >
                        <option value="<?php echo $Data->Laundry_Price; ?>">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                  <?php } else {?>
                    <input type="hidden" id="Laundry_Price<?php echo $Order_Id?>" value="0">
                  <?php }?>
                  <div class="form-group col-lg-12">
                    <label for="exampleInputEmail1">Total <?php echo $Data->Services_Name; ?></label>
                    <!-- Mengganti dropdown dengan input number untuk total baju -->
                    <input type="number" class="form-control" required id="total_Order<?php echo $Order_Id?>" min="0">
                  </div>
                  <div class="form-group col-lg-12">
                    <input  name="" type="button" onclick="submitPass<?php echo $Order_Id?>()"  class="btn btn-success form-control" value="Order ">
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function submitPass<?php echo $Order_Id?>(){
    var total_Order  = document.getElementById('total_Order<?php echo $Order_Id?>').value;
    var Servies_type  = document.getElementById('Servies_type<?php echo $Order_Id?>').value;
    var Servies_name  = document.getElementById('Servies_name<?php echo $Order_Id?>').value;
    var Dry_Price  = document.getElementById('Dry_Price<?php echo $Order_Id?>').value;
    var Laundry_Price  = document.getElementById('Laundry_Price<?php echo $Order_Id?>').value;

    $.ajax({url: "ajax/orderinsert.php?total_Order=".concat(total_Order,"&Servies_name=".concat(Servies_name,"&Dry_Price=".concat(Dry_Price,"&Laundry_Price=".concat(Laundry_Price,"&Servies_type=".concat(Servies_type))))), success: function(result){
      setTimeout($('#myModal<?php echo $row->ID; ?>').modal('hide'), 50000);
      $("#Mor_Eve").html(result);
    }});
  }
</script>
