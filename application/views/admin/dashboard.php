<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('admin/css.php'); ?> 
    <body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
        	<?php $this->load->view('admin/header.php'); ?> 
        	<?php $this->load->view('admin/nav.php'); ?> 
		 	<div class="content-wrapper">
		 		<div id="mainContentdiv">
			     	<?php $this->load->view('admin/reportdetails.php'); ?> 
		     	</div>
			</div>
			
	        <?php
			    $this->load->view('admin/footer.php');
			?> 
        </div> 
	</body>
</html> 
<script type="text/javascript">
	$(function () {
      $('#sliderDetails').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      });
      $('#sliderDetailsmy').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      });
      
    });
	function ApplicationAction(type,appNO){
		$('#AppNumber').val(appNO);
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
      	var url='<?php echo base_url();?>index.php?adminController/claimopenapp/'+type;
      	var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#groupId").serialize()}; 
      	$("#groupId").ajaxSubmit(options);
	    setTimeout($.unblockUI, 600);
	}
	function releaseAppliction(AppNo){
		$('#AppNumber').val(AppNo);
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
      	var url='<?php echo base_url();?>index.php?adminController/release/';
      	var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#groupId").serialize()}; 
      	$("#groupId").ajaxSubmit(options);
	    setTimeout($.unblockUI, 600);
	}
	function openapplicitonresubmit(appno,tye){
		$('#AppNumber').val(appno);
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
      	var url='<?php echo base_url();?>index.php?adminController/opentoresubmit/'+tye;
       	var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#groupId").serialize()}; 
      	$("#groupId").ajaxSubmit(options);
	    setTimeout($.unblockUI, 600);
	}
</script>

