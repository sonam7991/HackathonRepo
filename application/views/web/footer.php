<div class="w3-agile-footer">
    <div class="container">
      <div class="agileits-w3layouts-copyright">
        <p>© 2020 Bhutan Telecom . All Rights Reserved | Design by JNEC </p>
      </div>
    </div>
  </div>
<script src="<?php echo base_url();?>assest/JqueryAjaxFormSubmit.js"></script>
<script src="<?php echo base_url();?>assest/jquery.form.js"></script>
<script src="<?php echo base_url();?>assest/jquery-blockUI.js"></script>
<script type="text/javascript">
    function loadpage(pagetype){
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
      $("#mainpublicContent").load('<?php echo base_url();?>index.php?baseController/loadpage/'+pagetype);
      setTimeout($.unblockUI, 1000); 
    }
	function sendMessage(formId){
        if(validatemessage()){
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
          var url='<?php echo base_url();?>index.php?websiteController/sendMessage/';
          var options = {target: '#mainpublicContent',url:url,type:'POST',data: $("#"+formId).serialize()}; 
          $("#"+formId).ajaxSubmit(options);
          setTimeout($.unblockUI, 600); 
        }
    }
    function validatemessage(){
        var returnval=true;
        if($('#Sender_Name').val()==""){
            $('#Sender_Name_err').html('Please  mention your name');
            returnval=false;
        }
        if($('#Sender_Email').val()==""){
            $('#Sender_Email_err').html('Please  mention your email');
            returnval=false;
        }
        if($('#Subject').val()==""){
            $('#Subject_err').html('Please  mention subject');
            returnval=false;
        }
        if($('#Message').val()==""){
            $('#Message_err').html('Please  mention Message');
            returnval=false;
        }
        return returnval;
    }
    
</script>