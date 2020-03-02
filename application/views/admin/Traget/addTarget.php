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
                        <label>Input Financial Target (Revenue):<span class="text-danger">*</span></label>
                        <input type="text" name="ftarget" id="ftarget"  class="form-control" placeholder="Financial Target" onclick="removeer('ftarget_err')">
                        <span id="ftarget_err" class="text-danger"></span>
                      </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Input Average Revenue Per User(Prepaid):<span class="text-danger">*</span></label>
                          <input type="text" name="arpupre" id="arpupre" class="form-control" placeholder="Average Revenue Per User(Prepaid)" onclick="removeer('email_err')">
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
                        <button class="btn btn-success pull-right" type="button" onclick="addUserDetails()">Add</button>
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
  	function addUserDetails(){
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
      var url='<?php echo base_url();?>index.php?adminController/addUser/';
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#adduserform").serialize()}; 
      $("#adduserform").ajaxSubmit(options);
      setTimeout($.unblockUI, 600); 

    }
    }
  function removeer(errid){
		$('#'+errid).html('');	
	}
  	
</script>
  	
