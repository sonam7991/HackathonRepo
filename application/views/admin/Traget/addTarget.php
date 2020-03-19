<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
      <div class="col-sm-6"> 
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Add Company Target</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<section class="content">
  <div class="container-fluid">
    <div class="card card-default">
      <div class="card-header">
        <h3 class="card-title">Input Target for Finanical Target(Company Target)</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
        </div>
      </div>
      <div class="card-body">
        <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'addtargetform', 'enctype' => 'multipart/form-data'));?>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Please mention the year :<span class="text-danger">*</span></label>
                          <input type="number" name="year" id="year" class="form-control" placeholder="Year" onclick="removeer('year_err')">
                          <span id="year_err"  class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Input Financial Target (Revenue in Million Nu.):<span class="text-danger">*</span></label>
                        <input type="text" name="ftarget" id="ftarget"  class="form-control" placeholder="Financial Target" onclick="removeer('ftarget_err')">
                        <span id="ftarget_err" class="text-danger"></span>
                      </div>
                      
                      </div>
                      <div class="form-group row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Input Average Revenue Per User(Prepaid):<span class="text-danger">*</span></label>
                          <input type="text" name="arpupre" id="arpupre" class="form-control" placeholder="Average Revenue Per User(Prepaid)" onclick="removeer('arpupre_err')">
                        <span id="arpupre_err" class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Input Average Revenue Per User(Postpaid):<span class="text-danger">*</span></label>
                        <input type="text" name="arpupost" id="arpupost" class="form-control" placeholder="Average Revenue Per User(Postpaid)" onclick="removeer('arpupost_err')">
                        <span id="arpupost_err" class="text-danger"></span>
                      </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Input Active User:<span class="text-danger">*</span></label>
                          <input type="number" name="activeu" id="activeu" class="form-control" placeholder="Active User" onclick="removeer('activeu_err')">
                          <span id="activeu_err"  class="text-danger"></span>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Input Sales of Vivo Phones:<span class="text-danger">*</span></label>
                        <input type="text" name="sales" id="sales"  class="form-control" placeholder="Sales of Vivo Phones" onclick="removeer('sales_err')">
                        <span id="sales_err" class="text-danger"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button class="btn btn-success pull-right" type="button" onclick="addtargetDetails()">Add</button>
                      </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script type="text/javascript">
  	function addtargetDetails(){

      //need to do validation
    if(validateform()){
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
      var url='<?php echo base_url();?>index.php?adminController/addTarget/';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#addtargetform").serialize()}; 
      $("#addtargetform").ajaxSubmit(options);
      setTimeout($.unblockUI, 600); 

    }
    }
  function validateform(){
    var returntype=true;
    if($('#year').val()==""){
      $('#year_err').html('*Year Number is required');  
      returntype=false;
    }
    if($('#ftarget').val()==""){
      $('#ftarget_err').html('*Financial Target is required'); 
      returntype=false;
    }
    if($('#mtarget').val()==""){
      $('#mtarget_err').html('*Monthly Financial Target is required'); 
      returntype=false;
    }
    if($('#arpupre').val()==""){
      $('#arpupre_err').html('*ARPU Prepaid is required'); 
      returntype=false;
    }
    if($('#arpupost').val()==""){
      $('#arpupost_err').html('ARPU Postpaid is required');  
      returntype=false;
    }
    if($('#activeu').val()==""){
      $('#activeu_err').html('Number of Active Users is required');  
      returntype=false;
    }
    if($('#sales').val()==""){
      $('#sales_err').html('Sales of Vivo Phones is required');  
      returntype=false;
    }
    return returntype;
  }
  function removeer(errid){
		$('#'+errid).html('');	
	}
  	
</script>
  	
