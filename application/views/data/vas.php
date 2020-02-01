 
 <section class="content-header">
	 <h1>
	    Home
	    <small>Import Data</small>
	 </h1>
</section>
<section class="content">
	<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Load Data for VAS Report(Subscriber)</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'importform', 'enctype' => 'multipart/form-data'));?>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label>Please mention the year :<span class="text-danger">*</span></label>
                         <input type="number" name="Year" class="form-control" id="Year">
                      </div>
                       <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                         <label>Please select the month :<span class="text-danger">*</span></label>
                         <select name="month" id="month" class="form-control">
                           <option value="">Select</option>
                           <option value="1">January</option>
                           <option value="2">Febaury</option>
                           <option value="3">March</option>
                           <option value="4">April</option>
                           <option value="5">May</option>
                           <option value="6">June</option>
                           <option value="7">July</option>
                           <option value="8">Agust</option>
                           <option value="9">September</option>
                           <option value="10">October</option>
                           <option value="11">November</option>
                           <option value="12">December</option>
                         </select>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Please input the total number of B-Wallet/B-Ngul New :<span class="text-danger">*</span></label>
                          <input type="text" name="bnew" onclick="removeer('bnew_err')" id="bnew" class="form-control">
                          <span id="bnew_err"  class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Please input the number of B-Wallet/B-Ngul Total :<span class="text-danger">*</span></label>
                          <input type="text" name="bwt" onclick="removeer('bwt_err')" id="bwt" class="form-control">
                          <span id="bwt_err"  class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Please input the number of B-Trowa Total :<span class="text-danger">*</span></label>
                          <input type="text" name="btwerwe" onclick="removeer('bt_err')" id="bt" class="form-control">
                          <span id="bt_err"  class="text-danger"></span>
                      </div>
                  </div>
                  </div>                  
                  <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11">
                        <button class="btn btn-success pull-right" type="button" onclick="updatevas()"> Upload</button>
                      </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</section>

<script type="text/javascript">
  function removeerr(errid){
    $('#'+errid).html('');  
  }
  function updatevas(){
    if(validate()){
      $.blockUI
          ({ 
            css: 
            { 
                  border: 'none', 
                  padding: '15px', 
                  backgroundColor: '#000', 
                  '-webkit-border-radius': '10px', 
                  '-moz-border-radius': '10px', 
                  opacity: .5, 
                  color: '#fff' 
            } 
          });
        var url='<?php echo base_url();?>index.php?adminController/insertvas/';
        var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#importform").serialize()}; 
        $("#importform").ajaxSubmit(options);
        setTimeout($.unblockUI, 600); 
         
    }
  }
  function validate(){
    var retuva=true;
    if($('#bnew').val()==""){
      $('#bnew_err').html('B-Wallet new required '); 
      retuva=false;
    }
    if($('#bwt').val()==""){
      $('#bwt_err').html('B-Wallet Total required');  
      retuva=false;
    }
    if($('#bt').val()==""){
      $('#bt_err').html('B-Trowa is required');  
      retuva=false;
    }
    return retuva;
  }
</script>




  	
