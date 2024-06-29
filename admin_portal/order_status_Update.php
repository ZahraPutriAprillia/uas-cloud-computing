
<div class="modal fade" id="exampleModalchangestatus<?php echo $count1;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Customer  Name : <strong><?php echo  $USer_NAME;?></strong></h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <!-- <span aria-hidden="true">×</span> -->
                          </button>
                        </div>
                        <div id="Mor_Eve"></div>

                        <div class="modal-body">
                            <input type="hidden" id="QR_CODE<?php echo $count1;?>"  value="<?php echo $QR_code;?>"> 
                            <select  class="form-control" 
                              id="Status_Order<?php echo $count1;?>">
                              <option disabled=""> Change Status </option>   
                              <option value="Deliver"> Deliver </option>
                              
                            </select>
                        </div>
                        <div class="modal-footer">
                           <input  name="" type="button" 
                           onclick="submitPass<?php echo $count1?>()"  class="btn btn-success form-control" value="Submit">
                        </div>
                      </div>
                    </div>
                  </div>

<script type="text/javascript">

  function submitPass<?php echo $count1?>(){
   var Status=document.getElementById('Status_Order<?php echo $count1?>').value;
   var CODE=document.getElementById('QR_CODE<?php echo $count1?>').value;
   
    $.ajax({url:"status-udate-ajax.php?Status=".concat(Status,"&CODE=".concat(CODE)), success: function(result){
      setTimeout($('#exampleModalchangestatus<?php echo $count1; ?>').modal('hide'), 50000);
      window.location.reload();
      $("#Mor_Eve").html(result);
     
    }});
   
  }
</script>                  