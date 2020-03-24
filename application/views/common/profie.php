<section class="content-header">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Home</a></li>
      <li class="breadcrumb-item active">Profile</li>
    </ol>
</section> 
<section class="content">
  <div class="container-fluid">
    <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">User Details</h3>
    </div>
    <?php echo form_open('#' , array('class' => 'form-horizontal validatable','id'=>'adduserform', 'enctype' => 'multipart/form-data'));?>
        <div class="card-body">
          <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>CID:</label>
                <input type="number" name="CID" value="<?=$userDetils->CID?>" id="CID" class="form-control">
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>Full Name:</label>
                <input type="text" value="<?=$userDetils->Full_Name?>" name="Full_Name" id="Full_Name" class="form-control">
              </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <label>Email/User Id:</label>
                <input type="text" value="<?=$userDetils->User_Id?>" name="User_Id" id="User_Id" class="form-control">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <label>Contact Number:</label>
              <input type="text" value="<?=$userDetils->Contact_Number?>" name="Contact_Number" id="Contact_Number" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <label>Role:</label>
              <input type="text" value="<?=$userDetils->Role_Name?>" class="form-control" readonly>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <label>Password:</label>
              <input type="text" name="Password" value="" id="Password" class="form-control">
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <input type="hidden" name="userId" value="<?php echo $this->session->userdata('User_table_id');?>">
              <button class="btn btn-success pull-right" type="button" onclick="updateDetails()"> <i class="fa fa-edit"></i>Update</button>
            </div>
          </div> 
      </div>
    </form>
  </div>
  </div>
</section>
<script type="text/javascript">
  	function updateDetails(){
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
      	var url='<?php echo base_url();?>index.php?adminController/updateUser/';
      	var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#adduserform").serialize()}; 
      	$("#adduserform").ajaxSubmit(options);
      	setTimeout($.unblockUI, 600); 
  	}
  	
</script>
  	
