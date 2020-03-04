<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Import Data</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Load Data for Mobile Report(Subscriber)</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <div class="card-body">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'importform', 'enctype' => 'multipart/form-data'));?>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group row">
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
                          <label>Upload the subscriber mobile file here :<span class="text-danger">*</span></label>
                          <input type="file" name="msubscriber" onclick="removeer('msubscriber_err')" id="msubscriber" class="form-control">
                          <span id="msubscriber_err"  class="text-danger"></span>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Upload the subscriber mobile postpaid disconnected file here :<span class="text-danger">*</span></label>
                          <input type="file" name="mpostdisconnect" onclick="removeer('mpostdisconnect_err')" id="mpostdisconnect" class="form-control">
                          <span id="mpostdisconnect_err"  class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Upload the subscriber mobile prepaid disconnected file here :<span class="text-danger">*</span></label>
                          <input type="file" onclick="removeer('mpredisconnect_err')" name="mpredisconnect" id="mpredisconnect" class="form-control">
                          <span id="mpredisconnect_err"  class="text-danger"></span>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Please input HLR count here : <span class="text-danger">*</span></label>
                         <input type="number" name="lhr" id="lhr" onclick="removeer('lhr_err')" class="form-control">
                         <span id="lhr_err"  class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Upload the HLR attachment here : <span class="text-danger">*</span></label>
                         <input type="file" name="lhrattachment" onclick="removeer('lhrattachment_err')" id="lhrattachment" class="form-control">
                         <span id="lhrattachment_err"  class="text-danger"></span>
                      </div>
                  </div>                  
                  <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-11">
                        <button class="btn btn-success pull-right" type="button" onclick="updateDetails()"></i>Upload</button>
                      </div>
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
    </div>
</section>

<script type="text/javascript">
  	function updateDetails(){
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
        var url='<?php echo base_url();?>index.php?adminController/insertexcelData/bmobilesubscriber';
        var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#importform").serialize()}; 
        $("#importform").ajaxSubmit(options);
        setTimeout($.unblockUI, 600); 
      }
  	}
    function validate(){
      
      var returntype=true;
      var parts=$('#msubscriber').val().split('.');
      var ext = parts[parts.length - 1];
      if($('#msubscriber').val()==""){
        $('#msubscriber_err').html('Please attach this excel file');  
        returntype=false;
      }
      else if(isvalidFile(ext)==false){
        $('#msubscriber_err').html('Not a valid file. Please provide xls,xlsx and csv');  
        returntype=false;
      }
      
      var parts=$('#mpostdisconnect').val().split('.');
      var ext = parts[parts.length - 1];
      if(isvalidFile(ext)==false){
        $('#mpostdisconnect_err').html('Not a valid file. Please provide xls,xlsx and csv');  
        returntype=false;
      }
      else if($('#mpostdisconnect').val()==""){
        $('#mpostdisconnect_err').html('Please attach this excel file'); 
        returntype=false;
      }

      var parts=$('#mpredisconnect').val().split('.');
      var ext = parts[parts.length - 1];
      if(isvalidFile(ext)==false){
        $('#mpredisconnect_err').html('Not a valid file. Please provide xls,xlsx and csv');  
        returntype=false;
      }
      else if($('#mpredisconnect').val()==""){
        $('#mpredisconnect_err').html('Please attach this excel file'); 
        returntype=false;
      }
      if($('#lhr').val()==""){
        $('#lhr_err').html('Please enter this value');  
        returntype=false;
      }
      if($('#lhrattachment').val()==""){
        $('#lhrattachment_err').html('Password attach supporting document for LHR');  
        returntype=false;
      }
      return returntype;
    }
    function removeer(errid){
      $('#'+errid).html('');  
    }
    function isvalidFile(ext) {
        switch (ext) {
        case 'xls':
        case 'xlsx':
        case 'csv':
            //etc
            return true;
        }
        return false;
    }

  	
</script>
  	
