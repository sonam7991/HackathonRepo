<section class="content-header">
	 <h1>
	    Home
	    <small>Add New user</small>
	 </h1>
</section>
<section class="content">
	<div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">User Details</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'adduserform', 'enctype' => 'multipart/form-data'));?>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>CID:</label>
                          <input type="number" name="CID" id="CID" class="form-control">
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Full Name:</label>
                        <input type="text" name="Full_Name" id="Full_Name" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Email/User Id:</label>
                          <input type="text" name="User_Id" id="User_Id" class="form-control">
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Contact Number:</label>
                        <input type="text" name="Contact_Numer" id="Contact_Numer" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                          <label>Role:</label>
                          <select name="Role_Id" id="Role_Id" class="form-control">
                            <option value=""> Select</option>
                            <?php foreach($rolelist as $i=> $role): ?>
                              <option value="<?=$role['Id']?>"> <?=$role['Role_Name']?></option>
                              <?php endforeach; ?>  
                          </select>
                      </div>
                      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <label>Password:</label>
                        <input type="text" name="Password" id="Password" class="form-control">
                      </div>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <button class="btn btn-success pull-right" type="button" onclick="addUserDetails()"> <i class="fa fa-plus"></i>Add</button>
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
  	function addUserDetails(){
      //need to do validation
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
  	
</script>
  	
