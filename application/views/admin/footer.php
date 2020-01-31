<script src="<?php echo base_url();?>assest/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>assest/admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assest/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url();?>assest/admin/bower_components/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>assest/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>assest/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>assest/admin/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url();?>assest/admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>assest/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>assest/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>assest/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assest/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assest/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>assest/admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assest/admin/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assest/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assest/admin/bower_components/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url();?>assest/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script src="<?php echo base_url();?>assest/JqueryAjaxFormSubmit.js"></script>
<script src="<?php echo base_url();?>assest/jspdf.min.js"></script>
<script src="<?php echo base_url();?>assest/html2canvas.min.js"></script>


<script src="<?php echo base_url();?>assest/jquery.form.js"></script>
<script src="<?php echo base_url();?>assest/jquery-blockUI.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assest/summernote/summernote-lite.js"></script>
<script type="text/javascript">
  $('.summernote').summernote({
      height:300
  });
  function remove_err(err_Id){
    $('#'+err_Id).html('');
  }
  function loadpage(url){
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
      $("#mainContentdiv").load(url);
      setTimeout($.unblockUI, 1000);
      
      
    }

    function update(type,formId){
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
      var url='<?php echo base_url();?>index.php?adminController/UpdateInfo/'+type;
      var options = {target: '#mainContentdiv',url:url,type:'POST',data: $("#"+formId).serialize()}; 
      $("#"+formId).ajaxSubmit(options);
      setTimeout($.unblockUI, 600); 
    }
    function checkfilesize(file,fileId,errorId,buttonId){
      var val=file.files[0].size/1024/1024,ext=$('#'+fileId).val().split('.').pop();
        if(val > 2){
            $('#'+errorId).html('Your file size should be below 2 mb. your current file size is '+val+' mb');
            file.value = "";
            $('#'+buttonId).hide();
        }
        else if(ext.toUpperCase()!="PNG" && ext.toUpperCase()!="JPG" && ext.toUpperCase()!="JPEG"){
            $('#'+errorId).html('you are not allow to attach this file. only png/jpg/jpeg are allowed ');
            file.value = "";
            $('#'+buttonId).hide();
        }
        else{
            $('#'+errorId).html('');
            $('#'+buttonId).show();
        }
    }
</script>