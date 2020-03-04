<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
    $this->load->view('web/header.php');
?> 
<body  style="background-color:orange;background-repeat: no-repeat;-webkit-background-size: cover;"> 
    <div id="mainpublicContent">     	
    	<div class="register" >
    		<br/><br/>
			<div class="container">
				<section class="content" style="background-image: url('<?php echo base_url();?>uploads/photo.png');background-repeat: no-repeat;-webkit-background-size: cover;">
      <div class="container-fluid">
            <div class="card">
				<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					
					<br/><br/><br/><br/>
					<h4 style="text-align: center;">Login Form</h4><br/>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<?php echo form_open('?baseController/loginuser' , array('class' =>'form-horizontal','id' => 'loginform'));?>
							
							<input name="EmailId" id="EmailId" onclick="removeerr('EmailId_err')" placeholder="Email Id / Username" type="text" class="form-control">
							<span id="EmailId_err" class="text-danger"></span><br />
							
							<input name="password" id="password" onclick="removeerr('password_err')" placeholder="Password" type="password" class="form-control"><span id="password_err" class="text-danger"></span><br>
							<button type="button" onclick="user_login()" class="btn btn-block btn-info btn-lg"> Login to Access</i></button>
							</form>
						</div>
					</div>
					<br/><br/><br/><br/><br/><br/>
					<hr />
					<footer class="text-center">
					 <div class="d-none d-sm-block ">
					      <b>Version</b> 1.0.0
					    </div>
					    <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Design by BhutanSyncITS</a>.</strong> All rights reserved.
					</footer>
				</div>
			</div>
		</div>
				</section>
				<br/><br/><br/>
			</div>
		</div>
		</div>
    </div>
    
   <!--   -->
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
 
