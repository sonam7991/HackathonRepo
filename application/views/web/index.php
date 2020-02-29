<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    $this->load->view('web/header.php');
?> 
<body>
    <div id="mainpublicContent">     	
    	<div class="register">
    		<br/><br/>
			<div class="container">
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<img src="<?php echo base_url();?>uploads/logo.png" alt="no imaged" onerror="this.src='<?php echo base_url();?>uploads/user.png'" width="108%" align="left">
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<b>Login Form</b>
					<br/><br/>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<?php echo form_open('?baseController/loginuser' , array('class' =>'form-horizontal','id' => 'loginform'));?>
							
							<input name="EmailId" id="EmailId" onclick="removeerr('EmailId_err')" placeholder="Email Id / Username" type="text" class="form-control">
							<span id="EmailId_err" class="text-danger"></span><br />
							
							<input name="password" id="password" onclick="removeerr('password_err')" placeholder="Password" type="password" class="form-control"><span id="password_err" class="text-danger"></span><br>
							<button type="button" onclick="user_login()" class="btn btn-info btn-block"> Login to Access <i class="fa fa-arrow-right"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <br/><br/>
	<?php
	    $this->load->view('web/footer.php');
	?>
</body>
<script type="text/javascript">
	function removeerr(errid){
		$('#'+errid).html('');	
	}
	function user_login(){
		if(validateloginform()){
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
	       $('#loginform').submit();
	       
		}
	}
	function validateloginform(){
		var retuva=true;
		if($('#EmailId').val()==""){
			$('#EmailId_err').html('Email Id/Username is required');	
			retuva=false;
		}
		if($('#password').val()==""){
			$('#password_err').html('Password is required');	
			retuva=false;
		}
		return retuva;
	}
</script>
 
